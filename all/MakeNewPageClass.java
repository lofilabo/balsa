package all;

import java.util.*;
import java.io.*;

public class MakeNewPageClass {

	public String pClassname;
	
	public void doMakeClassMgr(String pClassname){
		
		this.pClassname=pClassname;
		
		 File dir1 = new File (".");
	     String curDirAbs;
	     curDirAbs = dir1.getAbsolutePath();		
	     curDirAbs = curDirAbs.replace(".", "");
	     File cntrlDir = new File (curDirAbs + "Z_CONTROL/" +  pClassname +".php");
	     File logicDir = new File (curDirAbs + "Z_LOGIC/" + pClassname +".php");
	     File eviewDir = new File (curDirAbs + "Z_VIEW/" + pClassname +".em");
	     File superDir = new File (curDirAbs + "Z_VIEW/super" + pClassname +".em_");
	     
	     
	     
	     File cntrlTxt = new File (curDirAbs + "Z_ZZOURCE/" + "cntrl.php");
	     File logicTxt = new File (curDirAbs + "Z_ZZOURCE/" + "logic.php");
	     File eviewTxt = new File (curDirAbs + "Z_ZZOURCE/" + "view.em");
	     File superTxt = new File (curDirAbs + "Z_ZZOURCE/" + "superview.em");
	     
	     
	     
	     try{
	    	 getAllFileContents(cntrlTxt, cntrlDir);
	    	 getAllFileContents(logicTxt, logicDir);
	    	 getAllFileContents(eviewTxt, eviewDir);
	    	 getAllFileContents(superTxt, superDir);
	     }catch (IOException e) {}
	}
	
	private void getAllFileContents(File fromFile, File toFile)throws IOException{
        Scanner freader = new Scanner(fromFile);
        BufferedWriter writer = new BufferedWriter(new FileWriter(toFile));

        //... Loop as long as there are input lines.
        String line = null;
        while (freader.hasNextLine()) {
            line = freader.nextLine();
            line = line.replace("[--CLASSNAME--]", this.pClassname);
            writer.write(line);
            writer.newLine();   // Write system dependent end of line.
        }

        //... Close reader and writer.
        freader.close();  // Close to unlock.
        writer.close();  // Close to unlock and flush to disk.		
	}
	

}
