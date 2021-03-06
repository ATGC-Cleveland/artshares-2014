<?php
header("Content-type: text/xml;charset=iso-8859-1");
define('pagIsXSLT', true);
require_once("../../../wp-load.php");
/*
requires this condition around doctype in header file
<?php if(!defined('pagIsXSLT')): ?>
<?php endif; ?>
*/
?>
<<?php echo "?"; ?>xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9">
	<xsl:output method="html" indent="yes" 
		doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
		doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" />
	<xsl:template match="/">
<?php get_header(); ?>
		<h2>Site Map</h2>
		<table>
			<tr>
				<th>Page</th>
				<!--<th>Priority</th>
				<th>Frequency</th>-->
				<th>Last Modified</th>
			</tr>
		<xsl:for-each select="sitemap:urlset/sitemap:url">
			<xsl:sort select="sitemap:loc"/>
			<tr>
				<td><a>
					<xsl:attribute name="href">
						<xsl:value-of select="sitemap:loc"/>
					</xsl:attribute>
					<xsl:value-of select="substring(sitemap:loc, <?php echo strlen(get_bloginfo("url")) + 1; ?>)"/>
				</a></td>
				<!--<td><xsl:value-of select="sitemap:priority"/></td>
				<td><xsl:value-of select="sitemap:changefreq"/></td>-->
				<td>
					<xsl:value-of select="substring(sitemap:lastmod, 6, 2)"/>/<xsl:value-of select="substring(sitemap:lastmod, 9, 2)"/>/<xsl:value-of select="substring(sitemap:lastmod, 1, 4)"/> @
					<xsl:value-of select="substring(sitemap:lastmod, 12, 5)"/>
				</td>
			</tr>
		</xsl:for-each>
		</table>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
	</xsl:template>
</xsl:stylesheet>
