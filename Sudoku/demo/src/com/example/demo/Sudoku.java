package com.example.demo;

import javax.servlet.annotation.WebServlet;
import java.util.Stack;

import com.vaadin.annotations.Theme;
import com.vaadin.annotations.Title;
import com.vaadin.annotations.VaadinServletConfiguration;
import com.vaadin.data.Property;
import com.vaadin.event.dd.*;
import com.vaadin.event.dd.acceptcriteria.AcceptAll;
import com.vaadin.event.dd.acceptcriteria.AcceptCriterion;
import com.vaadin.server.VaadinRequest;
import com.vaadin.server.VaadinService;
import com.vaadin.server.VaadinServlet;
import com.vaadin.ui.Alignment;
import com.vaadin.ui.Button;
import com.vaadin.ui.DragAndDropWrapper;
import com.vaadin.ui.Button.ClickEvent;
import com.vaadin.ui.DragAndDropWrapper.DragStartMode;
import com.vaadin.ui.DragAndDropWrapper.WrapperTargetDetails;
import com.vaadin.ui.DragAndDropWrapper.WrapperTransferable;
import com.vaadin.ui.Embedded;
import com.vaadin.ui.GridLayout;
import com.vaadin.ui.HorizontalLayout;
import com.vaadin.ui.HorizontalSplitPanel;
import com.vaadin.ui.Label;
import com.vaadin.ui.Panel;
import com.vaadin.ui.UI;
import com.vaadin.ui.Upload;
import com.vaadin.ui.VerticalLayout;
import com.vaadin.ui.VerticalSplitPanel;

/**
 * The Application's "main" class
 */
@SuppressWarnings("serial")
@Theme("demo")
public class Sudoku extends UI {
	
	private Panel panel;
	private Panel userPanel;
//	private HorizontalSplitPanel hSplit = new HorizontalSplitPanel();
//	private VerticalSplitPanel vSplit = new VerticalSplitPanel();
	private GridLayout grid;
	private GridLayout userGrid;
	private Board board;
	
	private final VerticalLayout vLayout = new VerticalLayout();
	private final HorizontalLayout hLayout = new HorizontalLayout();
//	private final HorizontalLayout hLayout2 = new HorizontalLayout();
	private UploadReceiver uploadReceiver;
	private Upload upload;
	private Button solveButton = new Button("Solve");
	private Button checkButton = new Button("Check");
//	private Button easy = new Button("Easy");
//	private Button medium = new Button("Medium");
//	private Button hard = new Button("Hard");
	private Button undo = new Button("Undo");
	private Button reset = new Button("Reset");
	
	public static Stack<Label> labelStack = new Stack<Label>();
	public static Stack<Integer> intStack = new Stack<Integer>();

	@WebServlet(value = "/*", asyncSupported = true)
	@VaadinServletConfiguration(productionMode = false, ui = Sudoku.class)
	public static class Servlet extends VaadinServlet {
	}

	@Override
	protected void init(VaadinRequest request) {
		
//		setContent(hSplit);
//		
//		hSplit.setFirstComponent(vLayout);
//		hSplit.setSecondComponent(hLayout);
//		vSplit.setFirstComponent(hLayout);
//		vSplit.setSecondComponent(hLayout2);


		// Find the application directory
		String basepath = VaadinService.getCurrent()
		                  .getBaseDirectory().getAbsolutePath();
		
		System.out.println( basepath );


		// build a panel
		// https://vaadin.com/api/7.3.2/com/vaadin/ui/Panel.html
		
		// place a 9 x 9 grid control into the panel
		// https://vaadin.com/api/7.3.2/com/vaadin/ui/GridLayout.html
		
		// add a label to each element of the grid control
		// https://vaadin.com/api/com/vaadin/ui/Label.html
		// https://vaadin.com/api/7.3.2/com/vaadin/data/Property.Viewer.html
		// https://vaadin.com/api/com/vaadin/data/Property.html
		// https://vaadin.com/book/-/page/datamodel.html
		
		// each component should now be addressable by x,y

		
		
		grid = new GridLayout( 9, 9 );
		
		grid.setMargin(false);
		grid.setSpacing(false);
		grid.setWidth("300px");
		grid.setHeight("300px");
		grid.addLayoutClickListener(new GridClickListener());
		
		panel = new Panel();
		
		panel.setContent(grid);
		panel.setWidth("305px");
		panel.setHeight("305px");
		
		board = new Board();
		
		// connect the tile to the display
		for( int col = 0; col < 9; col++ ){
			for( int row = 0; row < 9; row++ )
			{
				final Label label = new Label();

				label.setPropertyDataSource(board.getCellElement(col, row));
				label.addValueChangeListener(new CEValueChangeListener());
				label.setWidth(null);
				label.setImmediate(true);
				//
				DragAndDropWrapper gridWrapper = new DragAndDropWrapper(label);
				gridWrapper.setData(label);
				gridWrapper.setSizeUndefined();
				gridWrapper.setDropHandler(new DropHandler() {
					
					@Override
					public AcceptCriterion getAcceptCriterion() {
						// TODO Auto-generated method stub
						return AcceptAll.get();
					}
					
					@Override
					public void drop(DragAndDropEvent event) {
						// TODO Auto-generated method stub
						WrapperTransferable t = (WrapperTransferable) event.getTransferable();
						
						//push onto stack before and after the drop
						//Get the dragged component instead of the wrapper
							Sudoku.labelStack.push(label);
							Sudoku.intStack.push(((CellElement)label.getPropertyDataSource()).getIntegerValue());
							Label source = (Label) t.getDraggedComponent();
							Property holder = label.getPropertyDataSource();
							holder.setValue(source.getPropertyDataSource().getValue());
							label.setPropertyDataSource(holder);
							
						//New target
//						Label copy = new Label(source.getValue());
//						copy.setSizeFull();
//						grid.removeAllComponents();
//						grid.addComponent(copy);
						
					}
				});
			
				grid.addComponent( gridWrapper, col, row );
			}
		}
		userGrid = new GridLayout(9, 1);
		userGrid.setMargin(false);
		userGrid.setSpacing(false);
		userGrid.setWidth("300px");
		userGrid.setHeight("30px");
		
		userPanel = new Panel();
		
		userPanel.setContent(userGrid);
		userPanel.setWidth("305px");
		userPanel.setHeight("32px");
		
		for (int col = 0; col < 9; col++){	
				Label userLabel = new Label();
				
				userLabel.setPropertyDataSource(new CellElement (col+1, true, col, 0));
				userLabel.setWidth(null);
				userLabel.setImmediate(false);
				userLabel.setReadOnly(false);
				
				DragAndDropWrapper wrapper = new DragAndDropWrapper(userLabel);
				wrapper.setData(userLabel);
				wrapper.setSizeUndefined();
				wrapper.setDragStartMode(DragStartMode.WRAPPER);
				
				userGrid.addComponent(wrapper, col, 0);
		}
		

		uploadReceiver = new UploadReceiver(grid, board);
		upload = new Upload(" ", uploadReceiver);
		upload.setButtonCaption("Load Soduko File");
		upload.setImmediate(true);

		vLayout.addComponent( hLayout );
		hLayout.addComponent(upload);
		hLayout.addComponent(solveButton);
		hLayout.addComponent(checkButton);
//		hLayout.addComponent(easy);
//		hLayout.addComponent(medium);
//		hLayout.addComponent(hard);
		hLayout.setMargin(true);
		hLayout.setSpacing(true);
		hLayout.setComponentAlignment(solveButton, Alignment.BOTTOM_RIGHT);
		hLayout.setComponentAlignment(checkButton, Alignment.BOTTOM_LEFT);
//		hLayout.setComponentAlignment(easy, Alignment.BOTTOM_LEFT);
//		hLayout.setComponentAlignment(medium, Alignment.BOTTOM_CENTER);
//		hLayout.setComponentAlignment(hard, Alignment.BOTTOM_RIGHT);
		
		vLayout.addComponent(reset);
		vLayout.addComponent(undo);
		vLayout.addComponent(panel);
		vLayout.addComponent (userPanel);
		vLayout.setMargin(true);
		vLayout.setSpacing(true);
		getPage().setTitle("Good Luck");
		
		setContent(vLayout);
	//	setContent(vSplit);

		// upload.setReceiver(uploadReceiver);
		upload.addFinishedListener(uploadReceiver);
		
		/*
		 * Click on the Solve or Check Button
		 */
		solveButton.addClickListener( new Solver( grid, board ));
		checkButton.addClickListener( new Checker( grid, board ));
		undo.addClickListener(new Undo(grid,board));
		reset.addClickListener(new BoardReset(grid, board));
//		easy.addClickListener(new DifficultySet(grid,board));
//		medium.addClickListener(new DifficultySet(grid,board));
//		hard.addClickListener(new DifficultySet(grid,board));
	}
}
