//Multiplication Table
#include <stdio.h>

//Create Function For Multiply
void MultiplicationTable(int number) {
    if (number <= 1) {
        printf("Error: Input number must be greater than 1.\n");
        return;
    }

    printf("Multiplication Table for %d:\n", number);
    for (int i = 1; i <= 15; i++) {
        printf("%d x %d = %d\n", i, number, i * number);
    }
}

//take Input From User and Function Call
int main() {
    int num;

    printf("Enter a number greater than 1: ");
    scanf("%d", &num);

    MultiplicationTable(num);

    return 0;
}
