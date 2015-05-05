computeDensities <- function(datasetFile,i,class,k) {
  df = read.csv(datasetFile,header=F)
  f = factor(df[,ncol(df)])
  classes = levels(f)
  min <- min(df[which(df[,ncol(df)]==class),i])
  max <- max(df[which(df[,ncol(df)]==class),i])
  
  range = max - min
  binSize = range/k
  
  bounds = seq(min,max,by = binSize)
  bins = c(rep(0,k))
  
  binNum = 1
  
  classIndex = which(df[,ncol(df)] == class)
  for(j in classIndex){
  
    if (df[j,i]<bounds[binNum+1]){
      bins[binNum] = bins[binNum] + 1
  }
    else if((df[j,i]) >= bounds[binNum+1] && ((df[j,i]) < bounds[k])){
      for(m in 2: k-1){
        if((df[j,i])>=bounds[m] && (df[j,i]) < bounds[m+1]){
        bins[m] = bins[m]+1
        }
      }
    }
  else{
    bins[k] = bins[k] +1
  }

  }
  
  binSum = sum(bins)
  binDensities = (bins/binSum)
  return(list(bounds=bounds, densities=binDensities))
  
}