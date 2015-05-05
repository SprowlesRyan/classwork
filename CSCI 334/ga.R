find.items.remove <- function(weight,capacity,chromosome) {
	current.weight = 0
	index <- c()
	for(i in 1: length(chromosome)){
		if (chromosome[i] == 1){
			current.weight <- current.weight + weight[i]
			index <- c(index, i)
		}
	}  	
	removed <- c()
	while(current.weight > capacity){
		heaviest <- which.max(weight[index])
		current.weight <- current.weight - heaviest
		index <- index[-where[index == heaviest]]
		remove <- c(remove,heaviest)
	}
  }

fitness <- function(profit,weight,capacity,chromosome) {  
  penalty = 0
  prof = 0
  
  penaltyItems = find.items.remove(weight,capacity,chromosome)
  items = which(chromosome == 1)
  
  for(i in 1:length(items)){
    prof = prof + profit[items[i]]  
  }
  
  if (is.null(penaltyItems)){
    penalty = 0
  }
  else{
    for(i in 1:length(penaltyItems)){
      penalty = penalty + (profit[penaltyItems[i]] * 2)
    } 
  }  
  return (prof - penalty)
  
}
}

select <- function(n,cumulative.fitneess){
 for(i in 1:length(cumulative.fitness)){
    if(i==1){
      prev=0
    }
    else{
      prev=cumulative.fitness[i-1]
    }
    if(n>=prev && n<=cumulative.fitness[i])
      return(i)
  }
  sms=cumsum(fs)
  n1=runif(1,0,max(sms))
  n2=runif(1,0,max(sms))
  i1=select(n1,sms)
  i2=select(n2,sms)
  
  return(c(i1,i2))
}

selection <- function(profit,weight,capacity,population){
 fitArray = c() 
  for(i in 1:nrow(population)) { 
    fitArray[i] = fitness(profit,weight,capacity,population[i,]) 
  } 
  sms = cumsum(fitArray)
  n1 = runif(1,0,max(sms)) 
  n2 = runif(1,0,max(sms)) 
  i1 = select(n1,sms) 
  i2 = select(n2,sms) 
  vector = c(i1,i2) 
  return(vector) 
}

crossover <- function(ch1,ch2,ix) {
   child1 = c(ch1[1:ix],ch2[(ix+1):length(ch2)])
   child2 = c(ch2[1:ix],ch1[(ix+1):length(ch2)])
}

mutation <- function(ch,p) {

}

tournament.survival <- function(profit,weight,capacity,population,bracket) {

}

ga <- function(profit,weight,capacity,pop.size,max.num.generations,init.p,mutation.p,max.num.gen.wo.improvement) {
  
}







