<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['loggedin']))
{
	header("location:"."index.php");
	exit();
}

include('includes/config.php');

echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "	<meta charset=\"utf-8\">\n";
echo "	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
echo "	<meta name=\"author\" content=\"FTG\">\n";
echo "	<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">\n";
echo "	<link href=\"https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css\" rel=\"stylesheet\" />\n";
echo "	<link rel=\"stylesheet\" href=\"css/bootstrap-datetimepicker.css\">\n";
echo "\n";
echo "	<link href=\"css/themes/flatly/bootstrap.css\" rel=\"stylesheet\" title=\"main\">\n";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css\">\n";
echo "	<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n";
echo "	<link href=\"css/simple-sidebar.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"css/switch.css\" rel=\"stylesheet\" /> \n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
echo "\n";
echo "  <div class=\"d-flex\" id=\"wrapper\">\n";
echo "	<!-- Sidebar -->\n";
echo "	<div class=\"\" id=\"sidebar-wrapper\">\n";
echo "	  <div class=\"sidebar-heading\">$panel_name </div>\n";
echo "	  <span><a class=\"list-grup-item\" href=\"https://t.me/\" target=\"_blank\">&nbsp&nbsp&nbsp&nbsp&#169  ".date("Y")." * FTG Panels * </a> </span></center>\n";
echo "	  <p>\n";
echo "	  <div class=\"list-group list-group-flush\">\n";
echo "		<a class=\"list-group-item list-group-item-action \" href=\"dns.php\">\n";
echo "		<i class=\"fa fa-cogs\"></i>	DNS Settinggs </a>\n";
echo "		<a class=\"list-group-item list-group-item-action \" href=\"user.php\">\n";
echo "		<i class=\"fa fa-user\" ></i>	 Update credentials </a>\n";
echo "	  </div>\n";
echo "	</div>\n";
echo "	<!-- /#sidebar-wrapper -->\n";
echo "\n";
echo "	<!-- Page Content -->\n";
echo "	<div id=\"page-content-wrapper\">\n";
echo "\n";
echo "\n";
echo "	  <nav class=\"navbar navbar-expand-lg navbar-dark \">\n";
echo "\n";
echo "		<button class=\"btn btn-primary\" id=\"menu-toggle\"><img src=\"img/logo.png\" width=\"25\" height=\"25\" class=\"d-flex justify-content-center text-allign centre\" alt=\"\"></button>\n";
echo "		\n";
echo "	  &nbsp;&nbsp;\n";
echo "\n";
echo "		<div class=\"btn-group\">\n";
echo "		<button type=\"button\" class=\"btn btn-warning dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Themes</button>\n";
echo "		<div class=\"dropdown-menu\">\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"cerulean\"><i class=\"fa fa-pencil\"> Cerulean</i></a></li>      </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"cosmo\"><i class=\"fa fa-pencil\"> Cosmo</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"cyborg\"><i class=\"fa fa-pencil\"> Cyborg</i></a></li>          </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"darkly\"><i class=\"fa fa-pencil\"> Darkly (default)</i></a></li></strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"flatly\"><i class=\"fa fa-pencil\"> Flatly</i></a></li>          </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"journal\"><i class=\"fa fa-pencil\"> Journal</i></a></li>        </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"litera\"><i class=\"fa fa-pencil\"> Litera</i></a></li>          </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"lumen\"><i class=\"fa fa-pencil\"> Lumen</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"lux\"><i class=\"fa fa-pencil\"> Lux</i></a></li>                </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"materia\"><i class=\"fa fa-pencil\"> Materia</i></a></li>        </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"minty\"><i class=\"fa fa-pencil\"> Minty</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"pulse\"><i class=\"fa fa-pencil\"> Pulse</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"sandstone\"><i class=\"fa fa-pencil\"> Sandstone</i></a></li>    </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"simplex\"><i class=\"fa fa-pencil\"> Simplex</i></a></li>        </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"sketchy\"><i class=\"fa fa-pencil\"> Sketchy</i></a></li>        </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"slate\"><i class=\"fa fa-pencil\"> Slate</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"solar\"><i class=\"fa fa-pencil\"> Solar</i></a></li>            </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"spacelab\"><i class=\"fa fa-pencil\"> Spacelab</i></a></li>      </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"superhero\"><i class=\"fa fa-pencil\"> Superhero</i></a></li>    </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"united\"><i class=\"fa fa-pencil\"> United</i></a></li>          </strong></h5>\n";
echo "			<strong><h5><li><a href=\"#\" class=\"change-style-menu-item\" rel=\"yeti\"><i class=\"fa fa-pencil\"> Yeti</i></a></li>              </strong></h5>\n";
echo "		</div>\n";
echo "		</div>\n";
echo "		\n";
echo "		<a href=\"logout.php\" class=\"btn btn-danger ml-auto mr-1\">Logout</a>\n";
echo "	  </nav>\n";
echo "\n";
echo "\n";
echo "\n";
echo "	  <div class=\"container-fluid\"><br>\n";

$message = '<div class="alert alert-success" id="success-alert"><center><h4 style="color:white!important"><i class="icon fa fa-check"></i>Updated!</h4></center></div>';
if(isset($_GET['status'])){
	if ($_GET['status'] == '1'){
		echo $message;
	}
}
?>