<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:msxsl="urn:schemas-microsoft-com:xslt" exclude-result-prefixes="msxsl">
    <xsl:output method="html" indent="yes"/>

<xsl:template match="/">

  <html>
       <head>
            <title>Moje Hobby</title>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="stylesheet" type="text/css" href="style.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
            <script src="script.js"></script>
            <script src="jquery.min.js"></script>
            <noscript>
                <link rel="stylesheet" type="text/css" href="noscript_style.css"/>
            </noscript>
       </head>
    <body>
        <div id="wrapper1">
			<header>
			    
			</header>
            
            <xsl:call-template name="nav" />

            <h1>Moje Hobby V 2</h1>

            <h3>Mój osobisty ranking nalepszych gitarzystów</h3>

            <div class="homediv1">
                <xsl:call-template name="gitarzyści"/>
            <br/>

            <xsl:apply-templates select="Rankingi/Gitarzyści/Gitarzysta[@mistrz='tak']" />

            <div class="gallery">
                  <xsl:apply-templates select="Rankingi/media/image[@title='hendrix']"/>
                <div class="opis">Jimi Hendrix</div>
            </div>
            <div class="gallery">
                  <xsl:apply-templates select="Rankingi/media/image[@title='sting']"/>
                <div class="opis">Sting</div>
            </div>
            <div class="gallery">
                  <xsl:apply-templates select="Rankingi/media/image[@title='clapton']"/>
                <div class="opis">Eric Clapton</div>
            </div>
            <div class="gallery">
                  <xsl:apply-templates select="Rankingi/media/image[@title='frusciante']"/>
                <div class="opis">John Frusciante</div>
            </div>
            <div class="gallery">
                  <xsl:apply-templates select="Rankingi/media/image[@title='cobain']"/>
                <div class="opis">Kurt Cobain</div>
            </div>

            <xsl:call-template name="gitary"/> 

            <xsl:apply-templates select="Rankingi/Gitary/Gitara" />

            </div>
        <xsl:call-template name="footer" />
        </div>
  </body>
  </html>

</xsl:template>

  <xsl:template name="nav">
		<nav class="topnav" id="myTopnav">
                <a href="index.html" class="active">Home</a>
                <a href="rodzaje.html">Rodzaje</a>
                <a href="przykładowe_akordy.html">Przykładowe chwyty</a>
                <div class="dropdown">
                    <button class="dropbtn">Mistrzowie gitary
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="hendrix.html">Jimy Hendrix</a>
                        <a href="#" class="active">Sting</a>
                        <a href="rankingi.xml">Rankingi</a>
                    </div>
                </div>
                <a href="kontakt.html">Kontakt</a>
                <a href="#" class="icon">
                <i class="fa fa-bars"></i> 
                </a> 
        </nav>	
	</xsl:template>

<xsl:template name="gitarzyści">
    <table border ="1" id ="table">
      <tr>
        <th>Nr</th>
        <th>Gitarzysta</th>
        <th>Pochodzenie</th>
      </tr>
      <xsl:for-each select="Rankingi/Gitarzyści/Gitarzysta/informacje">
        <xsl:sort select="." order="ascending"/>
        <xsl:choose>
        <xsl:when test="position() = 1">
        <tr style="background-color: gold;">
          <td>
            <xsl:number value="position()" format="1" />
          </td>
          <td>
            <xsl:value-of select="imie" /><xsl:text> </xsl:text><xsl:value-of select="nazwisko" />
          </td>
          <td>
            <xsl:value-of select="Pochodzenie" />
          </td>
        </tr>
        </xsl:when>
        <xsl:otherwise>
            <tr>
          <td>
            <xsl:number value="position()" format="1" />
          </td>
          <td>
            <xsl:value-of select="imie" /><xsl:text> </xsl:text><xsl:value-of select="nazwisko" />
          </td>
          <td>
            <xsl:value-of select="Pochodzenie" />
          </td>
        </tr>
        </xsl:otherwise>
        </xsl:choose>
      </xsl:for-each>
    </table>
  </xsl:template>

<xsl:template match="media/image">
		<img>
			<xsl:attribute name="src">
				<xsl:value-of select="@source"/>
			</xsl:attribute>
			<xsl:attribute name="title">
				<xsl:value-of select="."/>
			</xsl:attribute>
		</img>
</xsl:template>

<xsl:template name="gitary">
    <table border ="1" id="table2">
      <tr>
        <th>Model</th>
        <th>Rodzaj</th>
        <th>Średnia Cena($)</th>
        <th>Opis</th>
      </tr>
      <xsl:for-each select="Rankingi/Gitary/Gitara">
        <tr>
          <td>
            <xsl:value-of select="model"/>
          </td>
          <td>
            <xsl:value-of select="rodzaj"/>
          </td>
          <td>
            <xsl:call-template name="cena"/>
          </td>
          <xsl:choose>
            <xsl:when test="opis">
              <td>
                <br></br>
                <xsl:value-of select="opis"/>
                <br></br>
              </td>
            </xsl:when>
            <xsl:otherwise>
              <td>
                <br></br>
                NIE MAMY OPISU
                <br></br>
              </td>
            </xsl:otherwise>
          </xsl:choose>
        </tr>
      </xsl:for-each>
    </table>
  </xsl:template>

 <xsl:variable name="best_guitarist">
   <p class="best_guitarist"><xsl:text>Najlepszy gitarzysta wszechczasów: </xsl:text></p>
 </xsl:variable>

<xsl:template match="Gitarzyści//Gitarzysta[@mistrz='tak']">
	<xsl:if test="@mistrz='tak'">
        <xsl:copy-of select="$best_guitarist" />
        <p class="best_guitarist"><xsl:value-of select="informacje/imie" /><xsl:text> </xsl:text><xsl:value-of select="informacje/nazwisko"/></p>
    </xsl:if>
</xsl:template>

<xsl:variable name="nondescription_guitars">
   <p class="best_guitarist"><xsl:text>Następujące gitary oczekują na dodanie opisu: </xsl:text>
   <xsl:text> (</xsl:text><xsl:value-of select='format-number(round(0.333 * 100) div 100, "#.%")' /><xsl:text> wszystkich gitar)</xsl:text></p>
 </xsl:variable>

<xsl:template match="Gitary//Gitara">	
    <xsl:if test="position() = 1">
    <xsl:copy-of select="$nondescription_guitars" />
    </xsl:if>
    <xsl:if test="not(opis)">
        <p class="best_guitarist"><xsl:text> </xsl:text>- <xsl:value-of select="model" /></p>
    </xsl:if>
</xsl:template>

<xsl:template name="cena">	
    <xsl:if test="position()">
    <xsl:value-of select='format-number(model/@cena, "#")'/> $
    </xsl:if>
    <xsl:if test="position() = last()">
    <xsl:number value="model/@cena" grouping-size="1"
              grouping-separator="#" format="I"/> $
    </xsl:if>
</xsl:template>

<xsl:template name="footer">	
    <footer>
         Copyright 2019, <xsl:value-of select="Rankingi/footer/imie"/><xsl:text> </xsl:text><xsl:value-of select="Rankingi/footer/nazwisko"/><br/>
    </footer>
</xsl:template>

</xsl:stylesheet>