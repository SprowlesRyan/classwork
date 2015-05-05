The time to access something from cache, was ranging from 2.5-3.5 ns for me.
The time to access something from main memory was between 75-80 ns.
The way I did the timing for cache was just iterating through an array
	because it would preload the instructions since it was iterative.
The way i did the timing for the main memory was to iterate through an array
	getting random values in the array, because that caused the computer to not
	look in cache becasue the values weren't close.
The line size is 64 bits.
The way I calculated the line size was to iterate through an array by different amounts
	and since it was an int array I multiplied, the answer where there was consistent
	change was at 16 bits, but that multiplied by 4 gave the 64 bits.
The cache size is 1mb.
The way that I calculated cache size is by iterating through with the 64 bit
	line size and doing that over a 1mb array.
The difference in execution time that i was getting was cache being around 70-75ns faster 
	than main memory. So roughly 30 time faster.		