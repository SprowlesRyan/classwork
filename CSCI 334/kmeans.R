distance <- function(sample1,sample2){
  return(sqrt(sum((sample1-sample2)**2)))
}


assign.group <- function(means,sample) {
currentDistance = 1000
  for(i in 1:nrow(means)){
  	if(abs(distance(sample,means[i,])) < currentDistance){
  		currentDistance = abs(distance(sample, means[i,]))
  		currentGroup <- i  	
  	}
  }
  return(currentGroup)
}

assign.groups <- function(means,samples) {
	holder <- c()
	for(i in 1:nrow(samples)){
    holder <- c(holder, assign.group(means, samples[i,]))
	}
  return(holder)
}


calculate.means <- function(samples,groups) {
  z <- sort(unique(groups))
  means <- matrix(0,nrow=length(z),ncol=ncol(samples))
  for(i in 1:length(z)){
    means[i,] <- colMeans(samples[groups == z[i],])
  }
  return(means)
}


kmeans <- function(samples, init.means){
  holder <- assign.groups(init.means, samples)
  oldMeans <- init.means
  newMeans <- calculate.means(samples, holder)
  while(!(all(newMeans == oldMeans))){
    oldMeans <- newMeans
    holder <- assign.groups(oldMeans, samples)
    newMeans <- calculate.means(samples,holder)
  }
  return(newMeans)
}