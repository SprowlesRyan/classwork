%Number 1
%concatanates a string X with the string Y
add(X,Y,[X|Y]).

%Number 2
%evenlength returns true if even, oddlength returns true if odd
%looked up syntax for mod and conditionals, while using the length function
%that is in our notes
listLen([ ],0).
listLen([_|T],N):-listLen(T,N1), N is N1 + 1.

evenlength([]).
evenlength([H|T]) :-listLen([H|T],X), X mod 2 =:= 0.

oddlength([H|T]) :-listLen([H|T],X), X mod 2 =\= 0.

%Number 3
%Tracing Slonneger's code, with you're implimentation of Member and concat
member(X, [X|T]).
member(X, [H|T]) :- member(X,T).

concat([ ], L, L).
concat([H|T], L, [H|M]) :- concat(T, L, M).

member1(X, L) :- concat(L1, [X | L2], L). 

%Number 4
%last1 says what's last in the list, and will compare to what's put in
%returning true or false depending.

last1(L, X) :- concat(_,[X], L).

%Number 5
%finds out if List L is a subset of List S

sublist(L, S) :- concat(S2, S1, S),concat(_, L, S2).