#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

void delay(int);

int main(int argc, char *argv[])
{
    char buffer[65];

    for(;;){
        printf("OK>");
        scanf("%s", buffer);
        delay(10000);
        printf("%s\n", buffer);

        if( strcmp("quit", buffer) == 0 ){
            break;
        }
    }

    return 0;
}

void delay(int milliseconds)
{
    long pause;
    clock_t now, then;
    pause = milliseconds*(CLOCKS_PER_SEC/1000);
    now = then = clock();

    while( (now - then) < pause )
        now = clock();
}
