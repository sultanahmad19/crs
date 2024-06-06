
import javax.swing.JOptionPane;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author Student
 */
public class JavaOOPDemo {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        int howManyStudents =
                Integer.parseInt(JOptionPane.showInputDialog("Enter No of Students"));
            Student objUIITStd = new Student(howManyStudents);
    
            objUIITStd.readData();
    
            objUIITStd.showdetails();    
Double sCriteria =
                Double.parseDouble(JOptionPane.showInputDialog("Enter Filter Data"));
objUIITStd.showdetails(sCriteria);
        
   
    String sByName =
                JOptionPane.showInputDialog("Enter Name Filter Data");
objUIITStd.showdetails(sByName);
   
    
    }
}
