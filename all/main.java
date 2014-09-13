package all;


import java.io.File;
import java.io.IOException;
import java.util.*;
import all.Fileio;

public class main {
	
	public static void main(String[] args) {

		int i;
		int j;
		String cmd;
		i=args.length;
		String newpath;
		String newclass;
		/*
		for (j=0;j<i;j++){
			//read the argslist
			cmd=(args[j]);
			
		}
		*/
		
		Fileio fio = new Fileio();
		
		cmd="";
		
		if (i>0){
			//there are some arguments on the comand line.  if not, drop to interactive mode
			if (i>1){
				//there are two arguments.  this could be a new Site or a new Pageclass
				if (args[0].equalsIgnoreCase("s")){
					//it's a site.
					newpath="";
					for (j=1;j<i;j++){
						//roll up  the argslist to get the full path
						if (args[j].equalsIgnoreCase("-n")){
							//if we see a "switch-" type statement,
							//we know that it's not part of the file path
						}else{
							//it's not a switch, hence part of the file path
							cmd=cmd+(args[j]);
						}
						
					}
					newpath=cmd;
					
					//This is probably OK for development, but NEEDS to be moved to a 
					//config file or something.
					 File src = new File ("C:\\EclipseProjects\\j4");
					 File des = new File (cmd);
					 try{
						 fio.copyFiles(src, des);
					 }catch (IOException e) {}
					 
				}else{
					if(args[0].equalsIgnoreCase("p")){
						//it's a pageclass
						newclass=args[1];
						MakeNewPageClass oNc = new MakeNewPageClass();
						oNc.doMakeClassMgr(newclass);
						
					}else{
						//it's not a valid argument
					}
				}
			}else{
				//there is one argument.  this can mean only "update the database"
				//or "give me a status report"
				
			}
		}else{
			mainmenu();
		}
		
		
	     
	     //
	     
	}
	
	private static void mainmenu(){
        System.out.println("Enter a command");
        Scanner in = new Scanner(System.in);

        for(;;){
        	String inFile  = new String(in.next());  // File to read from.
        	
        	if (inFile.equalsIgnoreCase("q")){
        		break;
        	}else{
        		System.out.println(inFile); 
        	}
        }
        
        in.close();		
	}
	
}

