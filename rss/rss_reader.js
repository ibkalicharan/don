        $(document).ready(function () {
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