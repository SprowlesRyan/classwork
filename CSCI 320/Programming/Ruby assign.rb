#Ryan Sprowles
#November 5
#This code makes 3 different functions using lambda in Ruby

#This composes a fucntion based on another function
def compose(f, g)
	return lambda {|z| f.call(g.call(z))}
end

#This takes in an array of functions then applys the value to each function
def construct(list)
	return lambda{|x| list.map{ |z| z.call(x)}}
end

#Takes in a function to make a proc
#Takes in a list after made to a proc and applys the proc to everything
def apply_to_all(arg)
	return lambda{|x| x.map{ |z| arg.call(z)}}
end

#fuctions used in code	
f = lambda {|x| x + 2} 
g = lambda {|x| 3 * x}

h = lambda {|x| x * x}
i = lambda {|x| 2 * x}
j = lambda {|x| x / 2}

#Test cases for compose
o = compose(f,g)
print "Composing f and g with a call of 3: ", o.call(3).inspect, "\n"
print "Composing f and g with a call of 5: ", o.call(5).inspect, "\n"
print "Composing f and g with a call of 10: ", o.call(10).inspect, "\n"
print "Composing f and g with a call of -4: ", o.call(-4).inspect, "\n"

#Test cases for Construct
p = construct([h,i,j])
print "Constructing functions h, i, j  with a call of 3: ", p.call(3).inspect, "\n"
print "Constructing functions h, i, j  with a call of 4: ",  p.call(4).inspect, "\n"
print "Constructing functions h, i, j  with a call of 7: ",  p.call(7).inspect, "\n"
print "Constructing functions h, i, j  with a call of -5: ",  p.call(-5).inspect, "\n"

#Test cases for apply_to_all
r = apply_to_all(h)
print "Applying a function to the numbers 1, 2, 3: ", r.call([1,2,3]).inspect, "\n"
print "Applying a function to the numbers 12, -4, 13, 0: ", r.call([12,-4, 13, 0]).inspect, "\n"
print "Applying a function to the numbers 5, 1, 7, 2, 4, 5, 0: ",  r.call([5,1,7,2,4,5,0]).inspect, "\n"