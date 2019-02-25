#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <string.h>
#include <netdb.h>

int main (int argc, char *argv[])
{
      const int buffer_size = 1024*1024; // for more security and robustness
      const int req = 320;  // for more security and robustness
      const int hn = 225;  // for more security and robustness
      const int pn = 225;  // for more security and robustness
	char buffer[buffer_size];
    char reqt[req];
    char host[hn];
    char path[pn]; 
	int port = 80;
    strncpy(reqst,argv[1],req);
	sscanf(reqt,"http://%[^/]/%s",host,path);
	if(argc!=2)
	  {
	  printf("Usage: %s <host+path>\n",argv[0]);
	  exit(0); // not to be missed
          }
    int sockfd = socket(AF_INET, SOCK_STREAM, 0);
	if(sockfd<0) 
	{
	perror("Socket cannot be created");
 	}
    struct hostent *server_he; //a host address entry
	if ((server_he = gethostbyname(host)) == NULL) {  
	perror("Hostname cannot be resolved");     
	exit(2);
 	}
    struct sockaddr_in serveraddr; //Store the server address
	bzero((char *) &serveraddr,sizeof(serveraddr));
	serveraddr.sin_family=AF_INET;
	bcopy((char *) server_he->h_addr,
	  (char *) &serveraddr.sin_addr.s_addr,
	     server_he->h_length);
	serveraddr.sin_port=htons(port);
    if(connect(sockfd, (struct sockaddr *) &serveraddr, sizeof(serveraddr)) < 0) {
    perror("Cannot connect to the server"); 
    exit(3); 
    } 
	else
	printf("Connected to the server");
    char ret[req];
    sprintf(ret,"GET /%s HTTP/1.0\r\nHost:%s\r\n\r\n",path,host); 
    printf(ret,"Host=%s\r\n\r\n",path); 
   char ch= '/'; 
    char *filename; 
    filename = strrchr(ret,ch);
    int bytes_sent = send(sockfd, ret, strlen(ret) , 0);
    bzero(buffer,buffer_size);

    int bytes_received=recv(sockfd,buffer,buffer_size,0);
    if(bytes_received<0) 
    error("Socket:Error");
    printf("Message received: %s",buffer); 
    
    char *data;
    data=strstr(buffer, "\r\n\r\n");
    int code;
    sscanf(buffer,"HTTP/1.%*[01] %d ",&code); 
    if(code!=200)
    {
    char str[100];
    sscanf(buffer,"%[^\r]",str);
    printf("\nStatus Message is %s\n",str); 
    }
    else
    {
    printf("HTTP request is successful.\n");
    if(filename != NULL)
    {
    FILE *fileptr= fopen(filename+1,"w");
    int data_length_after_HTTP_header=(bytes_received)-((data-buffer)+4);
    fwrite(d+4,d_length_after_HTTP_header,1,fileptr);
    while((bytes_received=recv(sockfd,buffer,buffer_size,0))!=0)
             fwrite(buffer,bytes_received,1,fileptr);
    fclose(fileptr);
    }else
    {
    FILE *fp;
    fp = fopen("index.html","w+"); 
    int data_length_after_HTTP_header=(bytes_received)-((data-buffer)+4);
    fwrite(d+4,d_length_after_HTTP_header,1,fp);
    while((bytes_received=recv(sockfd,buffer,buffer_size,0))!=0)
    fwrite(buffer,bytes_received,1,fp);
    fclose(fp);
    }
    return 0;
    } }  

