all:
	clear
	make css
	make js
	make html

install:
	npm install -g jade
	npm install -g stylus
	npm install -g component
	bash install.sh

html:
	jade sources/views/*.jade -O public_html/

css:
	stylus sources/styles/main.styl -o public_html/css/

js:
	bash compiler.sh

clean-js:
	rm -fr sources/javascript/build sources/javascript/components sources/javascript/template.js

ftp-push:
	clear
	make all
	bash ftp-push.sh

deploy:
	git push origin master
	make ftp-push
ftp-deploy:
git ftp push -u ideaseco -p online ftp://www.ideasecopublicidad.com.ar

.PHONY: install  html all css clean-js
