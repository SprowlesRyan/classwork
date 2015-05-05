#Ryan Sprowles
#11/12/2013
#This is using ruby to do list processing in different ways

def sum(list)
	if list.empty?
		return 0
	else
		first, *rest = list
		if first.kind_of?(Array)
			return sum(first) + sum(rest)
		else
			return first + sum(rest)
		end	
	end	
end

def remove_odds(list)
	if list.empty?
		return list
	else
		first,*rest = list
		if first.kind_of?(Array)
			return remove_odds(first) + remove_odds(rest)
		elsif first.odd?
			return remove_odds(rest)
		else
			return remove_odds(rest).unshift(first)
		end	
	end
end	


def digits(num)
	if num.div(10).zero?
		return 1
	else
		return 1 + digits(num/10)
	end
end


def ith_digit(num, stopper)
	if stopper == 0
		return num.modulo(10)
	else
		return ith_digit(num/10, stopper-1)
	end	
end

def occurrences(num, numOccurrances)
    if num.div(10).zero?
    	return 1
		elsif num.modulo(10) == numOccurrances
			return 1 + occurrences(num.div(10), numOccurrances)
		else
			return occurrences(num.div(10), numOccurrances)
	end	
end	

def digital_sum(num)
    if num.div(10).zero?
		return num
	else
		return num.modulo(10) + digital_sum(num/10)
	end	
end

def digital_root(num)
    if num.div(10).zero?
		return num
	else	
		return digital_root(digital_sum(num))
	end	
end

#made to test sum and remove odds
list = [2,5,[3,5],1]
list2 = [1,2,3,4,5,[6,7]]
list3 = [[3,9,5],4,6,9]

#test cases
print sum(list).inspect + "\n"
print sum(list2).inspect + "\n"
print sum(list3).inspect + "\n"

print remove_odds(list).inspect + "\n"
print remove_odds(list2).inspect + "\n"
print remove_odds(list3).inspect + "\n"

#made to test methods 3-7
x = 123456
y = 99999999999
z = 12344563

#test cases
print digits(x).inspect + "\n"
print digits(y).inspect + "\n"
print digits(z).inspect + "\n"

print ith_digit(x, 2).inspect + "\n"
print ith_digit(x, 0).inspect + "\n"
print ith_digit(z, 4).inspect + "\n"

print occurrences(x, 2).inspect + "\n"
print occurrences(y, 9).inspect + "\n"
print occurrences(z, 3).inspect + "\n"

print digital_sum(x).inspect + "\n"
print digital_sum(y).inspect + "\n"
print digital_sum(z).inspect + "\n"

print digital_root(x).inspect + "\n"
print digital_root(y).inspect + "\n"
print digital_root(z).inspect + "\n"

