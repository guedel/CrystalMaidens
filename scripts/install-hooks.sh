#/usr/bin/env php
current=$(dirname $0)
cp -r ${current}/git-hooks/* "${current}/../.git/hooks"
chmod u+x "${current}/../.git/hooks"
