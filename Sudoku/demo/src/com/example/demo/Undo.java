package com.example.demo;

import java.util.Stack;

import com.vaadin.ui.Button.ClickEvent;
import com.vaadin.ui.Button.ClickListener;
import com.vaadin.ui.DragAndDropWrapper;
import com.vaadin.ui.GridLayout;
import com.vaadin.ui.Label;

public class Undo implements ClickListener {

	static final long serialVersionUID = 1L;

	GridLayout grid;
	Board board;
	
	public Undo(GridLayout grid, Board board) {
		this.grid = grid;
		this.board = board;
	}
	
	public void buttonClick(ClickEvent event) {
		
		if(!Sudoku.intStack.empty() && !Sudoku.labelStack.empty()) {
			
			Label previous = Sudoku.labelStack.pop();
			CellElement cell = (CellElement) previous.getPropertyDataSource();
			cell.setValue(Sudoku.intStack.pop());
			previous.setPropertyDataSource(cell);
		
//			System.out.println(cell.getValue());
		}
		else
			return ;
		
	}
}