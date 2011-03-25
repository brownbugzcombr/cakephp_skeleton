#!"C:\_work\xampp\perl\bin\perl.exe"
 
use CGI;
use CGI qw(header); 

my $query = new CGI;  
print $query->header ( );  

print "<p>GOOD</p>";
