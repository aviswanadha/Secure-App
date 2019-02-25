import java.net.*;
import java.io.*;
import java.util.ArrayList;
import java.util.*;
import java.util.Iterator;

public class EchoServer {
static ThreadList threadlist = new ThreadList();

public static void main(String[] args) throws IOException

{

if (args.length != 1) {
System.err.println("Usage: java EchoServer <port number>");
System.exit(1);
}

int portNumber = Integer.parseInt(args[0]);

try {
ServerSocket serverSocket =
new ServerSocket(Integer.parseInt(args[0]));
System.out.println("EchoServer is running at port " + Integer.parseInt(args[0]));

while(true)
{
Socket clientSocket = serverSocket.accept();
System.out.println("A client is connected");
EchoServerThread newthread=new EchoServerThread(threadlist,clientSocket);
threadlist.addThread(newthread);
newthread.start();
}
}
catch (IOException e)
{
System.out.println("Exception caught when trying to listen on port "
+ portNumber + " or listening for a connection");
System.out.println(e.getMessage());
}
}
}

class EchoServerThread extends Thread
{
private Socket clientSocket = null;
private int info;
ThreadList threadlist =null;
PrintWriter out = null;
private String[] cmnds = new String[3];
private HashMap<String, String> userlist;
private String inputLine;
private String usrname;
private String pswd; 
private String pswd1 = null;
private String command = null;
private String pattern = "^([a-zA-Z+]+[0-9+]+)$";

//private ArrayList<EchoServerThread> bucket = threadlist.threadlist;
public EchoServerThread(Socket socket)
{
clientSocket = socket;
}
public EchoServerThread(ThreadList threadlist ,Socket socket)
{
this.threadlist = threadlist;
clientSocket = socket;

}
public void run()
{
System.out.println("A new thread for client is running . number of connected clients..: "+threadlist.getNumberofThreads());

try
{
out = new PrintWriter(clientSocket.getOutputStream(), true);
BufferedReader in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
userlist = new HashMap<String, String>();
	userlist.put("Anuroopa","Anuroopa1");
	userlist.put("Vishal","Vishal2");
	userlist.put("Madhuri","Madhuri3");
while ((inputLine = in.readLine()) != null) {
cmnds = parseMessage(inputLine);
String name1 = this.getUserName();
command = cmnds[0];
usrname = cmnds[1];
pswd = cmnds[2];
System.out.println(command+" "+usrname+" "+pswd);
System.out.println(this.getLogInfo());
if(this.getLogInfo() == 1){
if(command.equals("<SEND>")){
	System.out.println("received from "+name1+": " + usrname);
}else{
System.out.println("Error!!!");
}
}
if(command.equals("<CHCK>"))
{ 
this.setUserName(usrname);
//Password Validation
for(Map.Entry entry: userlist.entrySet()){
	if(usrname.equals(entry.getKey())){
	pswd1 = String.valueOf(entry.getValue());
	break;
	}
}

//Validation
if(userlist.get(usrname)!=null){
			if(pswd1.equals(pswd) && pswd.matches(pattern)){
				
			}else out.println("Invalid Password");
		
}else {
out.println("user does not exist");
continue;
}
this.setLogInfo(1);
System.out.println(this.getUserName()+" Connected");
out.println("Connected");
}else
{
if(!command.equals("<SEND>")||!command.equals("<CHCK>"))
out.println("Please Enter Command: <CHCK> <SEND>");
continue;
}

/*
//Username
usrname = in.readLine().trim();
//Password
pswd  = in.readLine().trim();

for(Map.Entry entry: userlist.entrySet()){
	if(usrname.equals(entry.getKey())){
	pswd1 = String.valueOf(entry.getValue());
	break;
}
}

//Validation
if(userlist.get(usrname)!=null){
			if(pswd1.equals(pswd) && pswd.matches(pattern)){
				break;
			}else System.out.println("Invalid Password");
		
	}else System.out.println("user does not exist");
//Inputline = Message
inputLine = in.readLine();
if(inputLine!=null){
System.out.println("received from <username>: " + inputLine);
System.out.println("Echo back");
}else{
 System.out.println("Enter your Message: Dont Leave Blank: ");
inputLine = in.readLine();
}
*/
//if(inputLine.equals("<exit>"))
//{ //...

//out.println(inputLine);

//}
//else
//if(threadlist!= null)
//threadlist.sendToAll("to all <new message >" +inputLine);
}
}catch(IOException ioe)
{
System.out.println(" in thread: "+ioe.getMessage());
}

}

public String[] parseMessage(String msg)
{
String[] abc=new String[3];
abc[0] = msg.substring(0,6);
String[] temp = new String[2];
temp = msg.substring(6).split(":");
abc[1] = temp[0];
if(temp.length>1)
	abc[2] = temp[1];
else abc[2] = "";

return abc; 
}

public void send(String message)
{
if(out!=null)
out.println(message);
}


public int setLogInfo(int info){
this.info = info;
return info;
}
public int getLogInfo(){
return info;
}

public String setUserName(String usrname){
this.usrname = usrname;
return usrname;
}

public String getUserName(){
return usrname;
}
}

class ThreadList{
//private ... threadlist = //store the list of threads in this variable
public ArrayList<EchoServerThread> threadlist = new ArrayList<EchoServerThread>();
public int info;
public ThreadList(){
}
public synchronized int getNumberofThreads()
{
//return the number of current threads
return threadlist.size();
}
public synchronized void addThread(EchoServerThread newthread)
{
//add the newthread object to the threadlist
threadlist.add(newthread);
}
public synchronized void removeThread(EchoServerThread thread)
{
//remove the given thread from the threadlist
threadlist.remove(thread);
}
public void sendToAll(String message)
{
//ask each thread in the threadlist to send the given message to its client
}


}
