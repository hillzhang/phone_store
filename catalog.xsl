<?xml version="1.0" encoding="ISO-8859-1"?>

<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
   
   <title>Catalog</title>
	<br/>
	<br/>
	<br/>
	
  <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
    <xsl:for-each select="CATALOG/PHONE">
	  
      <div style="background-color:teal;color:white;padding:4px">
        <span style="font-weight:bold"><xsl:value-of select="Name/Brand" /></span>
        - <xsl:value-of select="Name/Model"/>
		- - -<xsl:value-of select="Price"/>
      </div>
      <div style="margin-left:20px;margin-bottom:1em;font-size:13pt">
	      <span style="font-style:italic">
		
        <xsl:value-of select="SYSTEM"/>
		<div>
          <xsl:value-of select="Location"/>
		   </div>
          <div> Color:      <xsl:value-of select="Color"/> </div>
		   <div> Features:     <div><xsl:value-of select="Features/Feature1"/> </div>
		      <div>             <xsl:value-of select="Features/Feature2"/> </div>
		       <div>             <xsl:value-of select="Features/Feature3"/> </div>
			    <div>             <xsl:value-of select="Features/Feature4"/> </div>
			    <div>             <xsl:value-of select="Features/Feature5"/> </div>
		   </div>
		   
        </span>
      </div>
    </xsl:for-each>
  </body>
</html><!--Reference
        W3 schools w3schools.com the world's largest web development site Refsnes Data 
         Retrieved 27/07/2012<http://www.w3schools.com/xml/simplexsl.xml>  
		 Linshan Zhang at 27/07/2012-->


