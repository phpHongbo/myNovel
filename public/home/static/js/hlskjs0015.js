function iframe() {
    //360渲染
    var oMeta = document.createElement('meta');

    oMeta.name = 'renderer';

    oMeta.content = 'webkit';

    document.getElementsByTagName('head')[0].appendChild(oMeta);

    var domainUrl = 'http://net.huanmusic.com/' + window.location.href.split('.').slice(1).join('.').split('/')[0] + '.html';

    window.addEventListener('message', function(event) {
        if (event.origin === "http://net.huanmusic.com") {
            var height = JSON.parse(event.data).height;
            var width = JSON.parse(event.data).width;
            iframe.width = width;
            iframe.height = height;
        }
    }, false);

    var year = new Date().getFullYear() + '';

    var month = new Date().getMonth() + 1;

    if (month < 10) {
        month = '0' + (month + '');
    } else {
        month = month + '';
    }
    var day = new Date().getDate();
    if (day < 10) {
        day = '0' + (day + '');
    } else {
        day = day + '';
    }
    var timeStamp = year + month + day;

    var div = document.createElement('div');
    div.style.position = 'fixed';
    div.style.left = '0';
    div.style.bottom = '80px';
    div.style.zIndex = '666666';
    document.querySelector('body').appendChild(div);
    var iframe = document.createElement('iframe');
    iframe.className = 'huanyin';
    iframe.borderWidth = '0px';
    iframe.frameBorder = '0';
    iframe.border = '0px';
    iframe.marginWidth = '0';
    iframe.marginHeight = '0';
    iframe.scrolling = 'no';
    iframe.width = '90px';
    iframe.height = '75px';

    var scriptSrc = document.getElementById('huanyin').src;

    var temp = scriptSrc.split('?')[1].split('&');

    var container;
    for (var j = 0; j < temp.length; j++) {
        if (temp[j].split('=')[0] === 'name') {

            var name = temp[j].split('=')[1];

            if (name.substr(0, 1) === '.') {
                if (name.indexOf('____') !== -1) {
                    container = document.getElementsByClassName(name.slice(1, name.indexOf('____')))[name.slice(name.indexOf('____') + 4)];
                } else {
                    container = document.getElementsByClassName(name.slice(1))[0];
                }
            } else {
                container = document.getElementById(name);
            }
        } else if (temp[j].split('=')[0].indexOf('data-class') === 0) {
            div.className = div.className + ' ' + temp[j].split('=')[1];
        } else if (temp[j].split('=')[0].indexOf('data-after') === 0) {
            if (container && container.parentNode) {
                container.parentNode.insertBefore(div, container.nextSibling);
            } else if (container && container.nextSibling) {
                document.querySelector('body').insertBefore(div, container.nextSibling);
            }
        } else {
            div.style[temp[j].split('=')[0]] = temp[j].split('=')[1];
        }

    }
    iframe.src = 'http://net.huanmusic.com/zy/hlsk0015.html' + '?' + timeStamp;
    div.appendChild(iframe);
}
window.onload = iframe();
