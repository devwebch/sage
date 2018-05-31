echo "Start npm install"
/opt/plesk/node/9/bin/npm install --scripts-prepend-node-path
echo "End npm install"
echo "Start npm run build"
/opt/plesk/node/9/bin/npm run build --scripts-prepend-node-path
echo "End npm run build"
