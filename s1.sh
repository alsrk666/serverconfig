rm -rf mobilefirst
git clone http://github.com/saisasank001/mobilefirst.git
server stop 
rm -rf /opt/ibm/wlp/usr/servers/defaultServer/server.xml
cp server.txt /opt/ibm/wlp/usr/servers/defaultServer/server.xml
server start
