function printContent(id) {
    str = document.getElementById(id).innerHTML
    newwin = window.open("", "printwin", 'left=100,top=100,width=800,height=800')
    newwin.document.write('<HTML>\n<HEAD>\n')
    newwin.document.write('<TITLE>Print Page</TITLE>\n')
    newwin.document.write('<style> @page {size: 216mm 313mm;margin: 0mm 0mm 0mm 0mm;}</style>\n')
        //img {display: none;}

    newwin.document.write('<script>\n')
    newwin.document.write('function chkstate(){\n')
    newwin.document.write('if(document.readyState=="complete"){\n')
    newwin.document.write('window.close()\n')
    newwin.document.write('}\n')
    newwin.document.write('else{\n')
    newwin.document.write('setTimeout("chkstate()",5000)\n')
    newwin.document.write('}\n')
    newwin.document.write('}\n')
    newwin.document.write('function print_win(){\n')
    newwin.document.write('window.print();\n')
    newwin.document.write('chkstate();\n')
    newwin.document.write('}\n')
    newwin.document.write('<\/script>\n')
    newwin.document.write('</HEAD>\n')
    newwin.document.write('<BODY dir="rtl" onload="print_win()">\n')
    newwin.document.write(str)
    newwin.document.write('</BODY>\n')
    newwin.document.write('</HTML>\n')
    newwin.document.close()
}