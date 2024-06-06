import java.util.Scanner;
public class Student {
Scanner obinput;    
    String[] regNo;
    int aSize;
    String[] sname;
    Double[] sPer;
public Student(int arrSize)
{
regNo = new String[arrSize];
sPer= new Double[arrSize];
sname=new String[arrSize];
obinput = new Scanner(System.in);
aSize = arrSize;
}
public void readData()
{
    for (int i = 0; i < aSize; i++) 
    {
    System.out.println("Enter Student Name at Index " + i);
    sname[i] = obinput.nextLine();
    }
  for (int i = 0; i < aSize; i++) 
  {
    System.out.println("Enter Student Reg No against " + sname[i]);
    regNo[i] = obinput.nextLine();
}
for (int i = 0; i < aSize; i++) {
      System.out.println("Enter Student Per of" + regNo[i]);
sPer[i] = obinput.nextDouble();
}
}
public void showdetails()
{
int sNo=1;
    System.out.println("Student Details");
    System.out.println("SNo\tS Name\tS Per");
    for (int i = 0; i < aSize; i++) 
    {
    System.out.println(sNo + "\t"+ regNo[i] + "\t" + sname[i] + "\t" + sPer[i]);
    sNo++;
    }
}
public void showdetails(Double searchCriteria)
{
int sNo=1;
    System.out.println("Student Details");
      System.out.println("------------------------------------------");
    System.out.println("SNo\tREg No\t\tS Name\t\tS Per");
    for (int i = 0; i < aSize; i++) 
    {
        if(sPer[i] > searchCriteria)
        {
    System.out.println(sNo + "\t"+ regNo[i] + "\t" + sname[i] + "\t" + sPer[i]);
    sNo++;
    }
    }
System.out.println("---------------end of List---------------");
}
public void showdetails(String searchCriteria)
{
int sNo=1;
    System.out.println("Student Details");
      System.out.println("------------------------------------------");
    System.out.println("SNo\tREg No\t\tS Name\t\tS Per");
    for (int i = 0; i < aSize; i++) 
    {
        if(sname[i].contains(searchCriteria))
        {
    System.out.println(sNo + "\t"+ regNo[i] + "\t" + sname[i] + "\t" + sPer[i]);
    sNo++;
    }
    }
System.out.println("---------------end of List---------------");
}
public void showdetails(Double per, String searchCriteria)
{
int sNo=1;
    System.out.println("Student Details");
      System.out.println("------------------------------------------");
    System.out.println("SNo\tREg No\t\tS Name\t\tS Per");
    for (int i = 0; i < aSize; i++) 
    {
        if(sname[i].startsWith(searchCriteria) && sPer[i]<per)
        {
    System.out.println(sNo + "\t"+ regNo[i] + "\t" + sname[i] + "\t" + sPer[i]);
    sNo++;
    }
    }
System.out.println("---------------end of List---------------");
}

}
