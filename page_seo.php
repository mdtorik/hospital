<?php

/**
 * @author Md Nur Un Nabi Tutul
 * @copyright 2021
 */


$page = basename($_SERVER['SCRIPT_NAME']);

switch ($page) {
	case 'index.php':
        $title = "AMAR HMS Directory | Home";
        $description = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $keywords = "hospital directory | clinic directory | diagnostic center directory | directory list | directory in bangladesh";
        $canonical = "#";
        $ogTitle = "AMAR HMS Directory | Home";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "AMAR HMS Directory | Home";
        $twitterTitle = "AMAR HMS Directory | Home";
        $twitterDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        break;

    case 'list-view.php':
        $title = "AMAR HMS Directory List";
        $description = "Amar HMS directory list view for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $keywords = "hospital directory list | clinic directory list | diagnostic center directory list | directory list | directory in bangladesh";
        $canonical = "#";
        $ogTitle = "AMAR HMS Directory List";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "AMAR HMS Directory List";
        $twitterTitle = "AMAR HMS Directory List";
        $twitterDescription = "Amar HMS directory list view for Hospital, Clinic, Diagnostic centers in Bangladesh";
        break;

    case 'details-view.php':
        $title = "AMAR HMS Directory Details";
        $description = "Amar HMS directory list view for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $keywords = "hospital directory list | clinic directory list | diagnostic center directory list | directory list | directory in bangladesh";
        $canonical = "#";
        $ogTitle = "AMAR HMS Directory Details";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "AMAR HMS Directory Details";
        $twitterTitle = "AMAR HMS Directory Details";
        $twitterDescription = "Amar HMS directory list view for Hospital, Clinic, Diagnostic centers in Bangladesh";
        break;   

    case 'blog-list.php':
        $title = "Blog List";
        $description = "Amar HMS directory blog list.";
        $keywords = "Amar HMS Blog List";
        $canonical = "#";
        $ogTitle = "Blog List";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "Blog List";
        $twitterTitle = "Blog List";
        $twitterDescription = "Amar HMS directory blog list.";
        break;     

    case 'blog-details.php':
        $title = "Blog Details";
        $description = "Amar HMS directory blog details.";
        $keywords = "Amar HMS Blog details";
        $canonical = "#";
        $ogTitle = "Blog List";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "Blog List";
        $twitterTitle = "Blog List";
        $twitterDescription = "Amar HMS directory blog details.";
        break;    

    case 'contact.php':
        $title = "Contact - Esteem Soft Ltd.";
        $description = "AMAR HMS is a product of Esteem Soft Limited.";
        $keywords = "Contact Esteem Soft Limited. | Esteem Soft Limited | Bangladesh";
        $canonical = "https://esteemsoftbd.com/contact";
        $ogTitle = "Contact - Esteem Soft Ltd.";
        $ogDescription = "AMAR HMS is a product of Esteem Soft Limited.";
        $ogURL = "https://esteemsoftbd.com/contact";
        $ogSiteName = "Contact - Esteem Soft Ltd.";
        $twitterTitle = "Contact - Esteem Soft Ltd.";
        $twitterDescription = "AMAR HMS is a product of Esteem Soft Limited.";
        break;
		    	
	default :
        $title = "AMAR HMS Directory | Home";
        $description = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $keywords = "hospital directory | clinic directory | diagnostic center directory | directory list | directory in bangladesh";
        $canonical = "#";
        $ogTitle = "AMAR HMS Directory | Home";
        $ogDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        $ogURL = "#";
        $ogSiteName = "AMAR HMS Directory | Home";
        $twitterTitle = "AMAR HMS Directory | Home";
        $twitterDescription = "Amar HMS directory for Hospital, Clinic, Diagnostic centers in Bangladesh";
        break;
} 
?>