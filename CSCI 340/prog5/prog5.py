import math

def hash(string):
    return int(math.log(float(string),2))
readFile =  open('outfile.txt')
readFile.readline()
lineValue = float(readFile.readline())
#print finalValue
startValue = 1
matrix = [0]
while startValue < lineValue:
    matrix.append(0)
    startValue = startValue * 2
    #print startValue
#print len(matrix)
matrix[len(matrix)-1] = matrix[len(matrix)-1] + 1
nextValue = float(readFile.readline())
#print matrix
print nextValue
while nextValue != None:
    total = 1
    if nextValue == 0:
        break
    while total < nextValue:
        for i in range (len(matrix)-1):
            if total < nextValue:
                total = total * 2
                i = i + 1
            else:
                matrix[i-1] = matrix[i-1] + 1
                break
    nextValue = float(readFile.readline())
print matrix
    
