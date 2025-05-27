//Find Reverse Square Number
#include <stdio.h>

//Function For Reverse the Number
int reverseNumber(int number) {
    int reversed = 0;
    while (number != 0) {
        int digit = number % 10;
        reversed = reversed * 10 + digit;
        number /= 10;
    }
    return reversed;
}

//Function For Reverse Number is Square or Not
int isRSRN(int num) {
    int square = num * num;
    int reversedNum = reverseNumber(num);
    int squareOfReversedNum = reversedNum * reversedNum;
    int reversedSquare = reverseNumber(squareOfReversedNum);

    if (square == reversedSquare) {
        printf("%d is a Reverse Square Number.\n", num);
    }
    else {
        printf("%d is not a Reverse Square Number.\n", num);
    }
}

//take input from user and Function Call
int main() {
    int num;


    printf("Enter a number: ");
    scanf("%d", &num);

    isRSRN(num);

    return 0;
}
