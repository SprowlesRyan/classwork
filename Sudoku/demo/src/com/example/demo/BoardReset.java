package com.example.demo;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.List;

import com.vaadin.data.Property;
import com.vaadin.ui.Button.ClickEvent;
import com.vaadin.ui.Button.ClickListener;
import com.vaadin.ui.DragAndDropWrapper;
import com.vaadin.ui.GridLayout;
import com.vaadin.ui.Label;
import com.vaadin.ui.Upload.FinishedEvent;
import com.vaadin.ui.Upload.FinishedListener;
import com.vaadin.ui.Upload.Receiver;

public class BoardReset implements ClickListener {

	private static final long serialVersionUID = 1L;
	private static Cube c1, c2, c3, c4, c5, c6, c7, c8, c9;
	private static List<Cube> cubeList;

	private GridLayout grid;
	private Board board;
	
	public BoardReset( GridLayout grid, Board board )
	{
		this.grid = grid;
		this.board = board;
	}
	
	
	
	public void buttonClick(ClickEvent event) {
		
		cubeList = new ArrayList<Cube>();
		c1 = Cube.createCube(CubeTypes.TOPLEFT_11, board);
		c2 = Cube.createCube(CubeTypes.TOPMIDDLE_12, board);
		c3 = Cube.createCube(CubeTypes.TOPRIGHT_13, board);
		c4 = Cube.createCube(CubeTypes.MIDDLELEFT_21, board);
		c5 = Cube.createCube(CubeTypes.MIDDLEMIDDLE_22, board);
		c6 = Cube.createCube(CubeTypes.MIDDLERIGHT_23, board);
		c7 = Cube.createCube(CubeTypes.BOTTOMLEFT_31, board);
		c8 = Cube.createCube(CubeTypes.BOTTOMMIDDLE_32, board);
		c9 = Cube.createCube(CubeTypes.BOTTOMRIGHT_33, board);
		cubeList.add(c1);
		cubeList.add(c2);
		cubeList.add(c3);
		cubeList.add(c4);
		cubeList.add(c5);
		cubeList.add(c6);
		cubeList.add(c7);
		cubeList.add(c8);
		cubeList.add(c9);

	

	
	Square cell = EmptySquarePresent();
	
		
	for (int col = 0; col < 9; col++) {
		for( int row =0; row < 9; row++){
			
			Cube cc = findCube(row, col);
			
//			System.out.println("Testing" + 1);
		
			board.setValue(row, col, 0, false );
			
			// update the cube lists
//			cc.getLeftOutValues().remove(num);
//			cc.getCubeValues().add(0);
			
			
			// need to unassign				
			int value = board.getIntegerValue(col, row);
			//perform house keeping on our lists
			cc.getLeftOutValues().add(0);
			cc.getCubeValues().remove(0);
			board.setValue(row, col, 0, false ); // unassign
			
	}
	}
	for( int col = 0; col < 9; col++ ){
		for( int row = 0; row < 9; row++ ){
			Label label = ((Label)((DragAndDropWrapper)grid.getComponent(col, row)).getData());
			label.setPropertyDataSource(board.getCellElement(col, row));
		}
	}
	
}

	


/*
 * Find cube
 */
private Cube findCube(int i, int j) {
	for (Cube ll : cubeList) {
		if (i >= ll.getRowfromIndex() && i < ll.getRowtoIndex() && j >= ll.getColfromIndex() && j < ll.getColtoIndex()) {
			return ll;
		}
	}
	return null;
}

/*
 * Returns an empty square
 */
private Square EmptySquarePresent() {

	Square sq = new Square();
	for (int row = 0; row < 9; row++) {
		for (int col = 0; col < 9; col++) {
			if (board.getIntValue( col, row) == 0) {
				sq.setRowIndex(row);
				sq.setColumnIndex(col);
				sq.setEmptySquare(true);
				return sq;
			}
		}
	}
	return sq;
}

	
	}
