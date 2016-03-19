from reportlab.lib import colors
from reportlab.lib.pagesizes import letter, inch
from reportlab.platypus import SimpleDocTemplate, Table, TableStyle
import sys
import json
import base64

pageWidth = 5.5

try:
    print "tried"
    data = json.loads(base64.b64decode(sys.argv[1]))
except:
    print "ERRRRRRRORRROR"
    data = [['JSON ERROR','OR BIT ERROR'],['-1','-1']]
    #sys.exit(1)
print data
col = []
for i in data:
    colum = ((i))
    col.append(colum)

print col
print col[0]
print col[0][0]
print len(col[0])
print len(col)
c = SimpleDocTemplate('report.pdf', pagesize=letter)



elements = []
 
data= [['Position', 'R1', 'R2', 'R3', 'B1', 'B2', 'B3']]

for z in range(len(col[0])):
     temp = ['NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL']
     data.append(['NULL'])
     print data
     data[(z+1)] = temp
     print data
for colum in range(0,len(col)):
    print 'col'
    for row in range(0,len(col[0])):
        print 'row'
        try:
            data[row+1][colum] = col[colum][row]
        except:
            data[row+1][colum] = 'ERROR'
            print "error"
            print colum
            print row
    



t=Table(data,7*[(pageWidth*inch)/7.0], (len(col[0])+1)*[.5*inch])
t.setStyle(TableStyle([('ALIGN',(0,0),(-1,-1),'CENTER'),
                       ('VALIGN',(0,0),(-1,-1),'MIDDLE'),
                       ('TEXTCOLOR',(1,0),(3,-1),colors.red),
                       ('TEXTCOLOR',(4,0),(-1,-1),colors.blue),
                       ('ALIGN',(0,1),(0,-1),'LEFT'),
                       ('TEXTCOLOR',(0,0),(0,-1),colors.black),
                       ('VALIGN',(1,0),(-1,0),'BOTTOM'),
                       ('INNERGRID', (0,0), (-1,-1), 0.25, colors.black),
                       ('BOX', (0,0), (-1,-1), 0.25, colors.black),
                       ]))
 
elements.append(t)
# write the document to disk
c.build(elements)

result = {'status':'yes'}
print json.dumps(result)

