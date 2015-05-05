entropy <- function(Y) {
  u <- unique(Y)
  n <- c()
  for(i in 1: length(u)){
    ixs <- which(Y == u[i])
    p <- length(ixs)/length(Y)
    n[i] <- -p*log2(p)
  }
  return(sum(n))
}

spec.conditional.entropy <-function (Y,X,v){
  return(entropy(Y[which(X==v)]))
}

conditional.entropy <- function(Y,X) {
  xs = unique(X)
  xLength = length(xs)
  sums = 0
  for(i in 1: xLength){
 	  xValue = xs[i]
    probability = length(which(X==xValue))/length(X)
    sums = sums + (probability * spec.conditional.entropy(Y,X,xValue))	
  }
  return(sums)
}

information.gain <- function(Y,X) {
    return(entropy(Y) - conditional.entropy(Y,X))
}

split.Y <- function(Y,X) {
  z <- list()
  xs <- sort(unique(X))
  for(i in 1:length(xs)){
      z[[i]] <- Y[which(X==xs[i])]
  }
  return(z)
}

split.optimal <- function(Y,Xs){
  highest = -99
  highestX= Xs[1]
  for(i in 1:length(Xs)){
    current = information.gain(Y,Xs[,i])
    if(current > highest){
      highestX = Xs[,i]
      highest = current
    }
  }
  return(split.Y(Y,highestX))
}