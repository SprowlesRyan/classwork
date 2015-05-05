set.seed(100)
df = data.frame(V1=rnorm(100),V2=rnorm(100),V3=rnorm(100),V4=rnorm(100),V5=rnorm(100),Class=sample(c("One","Two","Three","Four"),100,replace=T))
for (i in 1:nrow(df)) {
    print(one.nn(df[-i,],df[i,1:ncol(df)-1]))


one.nn <- function(training.data,sample){
  lastColumn = names(training.data)[ncol(training.data)]
  results = c()
  for (i in 1:nrow(training.data)) {
    results[i]  = sum((training.data[i, 1:ncol(training.data) -1] -sample)**2)
  }
  finalResult= training.data[which.min(results),][lastColumn]
  return(finalResult[1,])
}

accuracy <- function(df) {
  total = nrow(df)
  correct = 0
  for(n in 1:nrow(df)) {
    if (n > 1) {
    newDf <- merge(df[1:n-1,], df[n+1:nrow(df),], all=TRUE)
     } else {
     newDf <- df[2:nrow(df),]
    }
  sampleDf = df[n,]
  prediction = one.nn(newDf, sampleDf[,1:ncol(df)-1])
  if (prediction == sampleDf[,ncol(df)]) {
  correct = correct + 1
                }
  }
  return(correct/total)
}