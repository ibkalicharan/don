// Old Code
/*        $(document).ready(function () {
            $.get("edinburgh-university-news.xml", function(data) {
                var $xml = $(data);
                var rssListItems = [];
                var $rss = $("#rss ul").eq(0)
                $xml.find("item").each(function() {
                    var $this = $(this),
                        item = {
                            title: $this.find("title").text(),
                            link: $this.find("link").text(),
                            description: $this.find("description").text(),
                            pubDate: $this.find("pubDate").text(),
                            author: $this.find("author").text()
                        }
                    
                    console.log(item.title);
                    var $innerLink = $("<a/>", {
                        html: item.title,
                        "class": "#rssLink",
                        href: item.link
                    });
                    rssListItems.push("<li>" + $("<div>").append($innerLink.clone()).html() + "</li>");
                });
                console.log(rssListItems.join(""))
                $("#rss").eq(0).append(rssListItems.join(""))
            });
        });
*/

// Generalised RSS reader to a function (requires jQuery)
// relativeUrl - URL of the xml file to parse as RSS on the server (since cross domain requests aren't allowed)
// ulId - The CSS ID you want to use to identify an RSS list
// linkId - The CSS ID you want to use to identify an RSS link
// Example of use: 
/*
 * $(document).ready(getRss("edinburgh-university-news.xml", "#rss", "#rssLink"));
 */

function getRss(relativeUrl, ulId, linkId) {
    $.get(relativeUrl, function(data) {
            var $xml = $(data);
            var rssListItems = [];
            var $rss = $(ulId + " ul").eq(0)
            $xml.find("item").each(function() {
                var $this = $(this),
                    item = {
                        title: $this.find("title").text(),
                        link: $this.find("link").text(),
                        description: $this.find("description").text(),
                        pubDate: $this.find("pubDate").text(),
                        author: $this.find("author").text()
                }
                
            console.log(item.title);
            var $innerLink = $("<a/>", {
                html: item.title,
                "class": linkId,
                href: item.link
            });
            rssListItems.push("<li>" + $("<div>").append($innerLink.clone()).html() + "</li>");
        });
        console.log(rssListItems.join(""))
        $("#rss").eq(0).append(rssListItems.join(""))
    });
}