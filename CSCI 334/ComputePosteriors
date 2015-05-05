ComputePosteriors = function(datasetFile, k) {
    df = read.csv(datasetFile, header= F)
    allPriors = computePriors(datasetFile)
    f = factor(df[,ncol(df)])
   
    classes = levels(f)
    priors = c(1:length(classes))
    for (b in 1:length(classes)) {
        priors[b] = allPriors$priors[b]
    }
    finalProbability = c(rep(1,length(classes)))
    output = matrix(1:(nrow(df)*length(classes)), ncol=length(classes))
    for (i in 1:nrow(df)) {
        classProbability = c(rep(1,length(classes)))
        for (j in 1:length(classes)) {
           
            for(n in 1:(ncol(df)-1)) {
                den1 = computeDensities(datasetFile,n,classes[j],k)
                valueHolder = 1
               
                if (df[i,n] < den1$bounds[2]) {
                    valueHolder = den1$densities[1]
                }
               
                else if ((df[i,n] > den1$bounds[2]) && (df[i,n] < den1$bounds[k])) {
                    for (q in 2:(k-1)) {
                        if(df[i,n] >= den1$bounds[q] && df[i,n] < den1$bounds[q+1]) {
                            valueHolder = den1$densities[q]
                        }
                    }
                }
               
                else {
                    valueHolder = den1$densities[k]
                }
               
                classProbability[j] = classProbability[j]*valueHolder
               
               
            }
        }
        for (w in 1:length(classes)) {
            classProbability[w] = classProbability[w]*priors[w]
        }
       
        bottom = 0
        for (z in 1:length(classes)) {
            bottom = bottom + classProbability[z]
        }
       
        for (u in 1:length(classes)) {
            finalProbability[u] = classProbability[u] / bottom
            output[i,u] = finalProbability[u]
        }
    }
   
    return(output)
   
}