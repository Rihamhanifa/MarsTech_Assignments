//Reverse Number
#include <stdio.h>

//Function For Reverse Numbers
int reverseNumber(int number) {
    int reversed = 0;
    int Input = number;

    while (number != 0) {
        int digit = number % 10;
        reversed = reversed * 10 + digit;
        number /= 10;
    }
    printf("Reversed number Of %d is : %d\n",Input, reversed);
}

int main() {
    int num;

    printf("Enter a number: ");
    scanf("%d",&num);

    reverseNumber(num);

    return 0;
}
