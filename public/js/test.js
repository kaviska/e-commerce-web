function findNearestNumber(numberSet, givenNumber) {
    let nearestNumber = null;
    let minDifference = Infinity;

    for (let i = 0; i < numberSet.length; i++) {
        const difference = givenNumber - numberSet[i];
        if (difference >= 0 && difference < minDifference && numberSet[i] < givenNumber) {
            nearestNumber = numberSet[i];
            minDifference = difference;
        }
    }

    return nearestNumber;
}

// Example usage:
const numberSet = [10, 20, 30, 40, 50];
const givenNumber = 21;
const nearest = findNearestNumber(numberSet, givenNumber);
console.log("Nearest number:", nearest); // Output will be 20




<button class="btn text-white alg-text-p book-btn alg-bg-yellow" onclick="storePackageData( '${
    element.package_id
  }','${
element.name
}')"><i class="bi bi-bookmark mx-1 d-sm-inline d-none"></i>Book Now</button>