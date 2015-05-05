accuracy <- function(df) {
	one.nn <- function(df, sample) {
		lastColname = names(df)[ncol(df)]
		dists = c()
		for (n in 1:nrow(df)) {
			dists[n] = sum((df[n, 1:ncol(df)-1] - sample) ** 2)
		}
		y = df[which.min(dists),][lastColname]
		return(y[1,])
	}
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