/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author student
 */
import java.util.Scanner;

public class MethodOverLoading {
    
Scanner objs;
int rNumber;
String sName;


public MethodOverLoading()
{
objs = new Scanner(System.in);
rNumber = 0;
sName ="";
}


public MethodOverLoading(int r, String n)
{
objs = new Scanner(System.in);
rNumber = r;
sName =n;
}

public void readData()
{
System.out.println("Please Enter Your Roll No");
rNumber = objs.nextInt();

System.out.println("Please Enter Your Name");
sName = objs.nextLine();

}
public void showData()
{

System.out.println("Your Roll No=" + rNumber);
System.out.println("Name=" + sName);

}


}











