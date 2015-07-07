<!DOCTYPE html>
<html>
    <head>
        <title>Test Case Generator</title>
        <style>
            tr{
                width: 100%;
            }
            td input[type=number]{
                width: 80px;
                margin: 5px;
            }
            
            .tel-data td:nth-child(2), 
            .tel-data td:nth-child(3),
            .tel-data td:nth-child(5),
            .tel-data td:nth-child(6),
            .tel-data td:nth-child(8),
            .tel-data td:nth-child(9){
                background: #e7e7e2;
            }
            .tel-data td:nth-child(4), 
            .tel-data td:nth-child(7),
            .tel-data td:nth-child(10){
                background: #BDC3C7;
            }
            .tel-data td:nth-child(11){
                background: #95A5A6;
            }
            .net-detail{position: relative; margin-top: 10px;}
            .detail-2g, .detail-3g {
                float: left;
                width: 240px;
            }
            .json-response{width: 100%; position: relative;}
            .json{width: 60%; float: left;}
            .json-raw{width: 30%; float: left; display: none;}
        </style>
        <link href="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css" rel="stylesheet" />
        
    </head>
    <body>
        <div class="tel-data">
            <table>
                <tr>
                    <th>
                        Usage Type
                    </th>
                    <th colspan="3">
                        In Network
                    </th>
                    <th colspan="3">
                        Off Network
                    </th>
                    <th colspan="3">
                        Landline
                    </th>
                    <th>Grand Total</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>Day</th>
                    <th>Night</th>
                    <th>Total</th>
                    <th>Day</th>
                    <th>Night</th>
                    <th>Total</th>
                    <th>Day</th>
                    <th>Night</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
                <tr class="local-call">
                    <td>Local Call</td>
                    <td class="in-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="in-network"><input type="number" class="night" value="0" min="0" data-ratio="0.45" /></td>
                    <td class="in-network"><input type="number" class="total" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="night" value="0" min="0" data-ratio="0.35" /></td>
                    <td class="off-network"><input type="number" class="total" value="0" min="0" data-ratio="0.6" /></td>
                    <td class="landline"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="landline"><input type="number" class="night" value="0" min="0" data-ratio="0.2" /></td>
                    <td class="landline"><input type="number" class="total" value="0" min="0" data-ratio="0.1" /></td>
                    <td class="grand-total"><input type="number" value="0" /></td>
                </tr>
                <tr class="std-call">
                    <td>STD Call</td>
                    <td class="in-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="in-network"><input type="number" class="night" value="0" min="0" data-ratio="0.6" /></td>
                    <td class="in-network"><input type="number" class="total" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="night" value="0" min="0" data-ratio="0.3" /></td>
                    <td class="off-network"><input type="number" class="total" value="0" min="0" data-ratio="0.6" /></td>
                    <td class="landline"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="landline"><input type="number" class="night" value="0" min="0" data-ratio="0.3" /></td>
                    <td class="landline"><input type="number" class="total" value="0" min="0" data-ratio="0.1" /></td>
                    <td class="grand-total"><input type="number" value="0" /></td>
                </tr>
                <tr class="local-sms">
                    <td>Local SMS</td>
                    <td class="in-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="in-network"><input type="number" class="night" value="0" min="0" data-ratio="0.2" /></td>
                    <td class="in-network"><input type="number" class="total" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="night" value="0" min="0" data-ratio="0.2" /></td>
                    <td class="off-network"><input type="number" class="total" value="0" min="0" data-ratio="0.6" /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="grand-total"><input type="number" value="0" /></td>
                </tr>
                <tr class="std-sms">
                    <td>STD SMS</td>
                    <td class="in-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="in-network"><input type="number" class="night" value="0" min="0" data-ratio="0.2" /></td>
                    <td class="in-network"><input type="number" class="total" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="day" value="0" min="0" /></td>
                    <td class="off-network"><input type="number" class="night" value="0" min="0" data-ratio="0.2" /></td>
                    <td class="off-network"><input type="number" class="total" value="0" min="0" data-ratio="0.6" /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="grand-total"><input type="number" value="0" /></td>
                </tr>
            </table>
            <br>
            <span>Conversion factor (sec/telco min)</span>
            <input class="convert" type="number" value="46"  min="15"/>
            <span>Variance in conversion</span>
            <input class="variance" type="number" value="4" min="0" />
        </div>
        <div class="net-data">
            <h4>Data Usage (MB)</h4>
            <input type="radio" name="net_type" class="type-2g" /> 2G only 
            <input type="radio" name="net_type" class="type-3g" /> 3G/2G
            <div class="net-detail">
                <div class="detail-3g">3G: <input type="number" class="data-3g" value="0" min="0" disabled /></div>
                <div class="detail-2g">2G: <input type="number" class="data-2g" value="0" min="0" /></div>
            </div>
        </div>
        Days: <input type="number" min="7" max="60" value="28" class="duration" />
        <input type="button" class="get-json" value="Get JSON" />
        <div class="json-response">
        <div class="json"></div>
        <textarea class="json-raw" rows="100"></textarea>
        </div>
        <script type="text/template" id="raw_json">
{  
   "metadata":{  
      "last_sync_timestamp":"2015-06-11T17:08:00Z",
      "device_id":"a1b9c4d3e3fg06h",
      "sso_id":"a1b912345678c4d3e3fg06h",
      "date":{  
         "$date":"2015-06-10T18:30:00.000Z"
      },
      "last_updated_date":"2015-06-11T17:08:00Z"
   },
   "data":{  
      "total":0,
      "2G":0,
      "3G":0,
      "4G":0,
      "wifi":0,
      "total_network":0
   },
   "sms":{  
      "local":{  
         "same_network":{  
            "day":{  
               "incoming":0,
               "outgoing":0
            },
            "night":{  
               "incoming":0,
               "outgoing":0
            }
         },
         "other_network":{  
            "day":{  
               "incoming":0,
               "outgoing":0
            },
            "night":{  
               "incoming":0,
               "outgoing":0
            }
         }
      },
      "std":{  
         "same_network":{  
            "day":{  
               "incoming":0,
               "outgoing":0
            },
            "night":{  
               "incoming":0,
               "outgoing":0
            }
         },
         "other_network":{  
            "day":{  
               "incoming":0,
               "outgoing":0
            },
            "night":{  
               "incoming":0,
               "outgoing":0
            }
         }
      },
      "isd":{  
         "incoming":0,
         "outgoing":0
      }
   },
   "call":{  
      "local":{  
         "same_network":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         },
         "other_network":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         },
         "landline":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         }
      },
      "std":{  
         "same_network":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":20,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         },
         "other_network":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         },
         "landline":{  
            "day":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            },
            "night":{  
               "incoming":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               },
               "outgoing":{  
                  "count":0,
                  "mins":0,
                  "secs":0
               }
            }
         }
      },
      "isd":{  
         
      }
   },
   
   "queryFrom":{  
      "$date":"2015-06-12T09:00:03.372Z"
   }
}
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.js" type="text/javascript"></script>
        <script>
            
            function connSelector(conn) {
                var sel = null;
                switch(conn) {
                    case 1:
                        sel = ".local-call";
                        break;
                    case 2:
                        sel = ".std-call";
                        break;
                    case 3:
                        sel = ".local-sms";
                        break;
                    case 4:
                        sel = ".std-sms";
                        break;
                }
                return sel;
            }
            
            function netSelector(net) {
                var sel = null;
                switch(net) {
                    case 1:
                        sel = ".in-network";
                        break;
                    case 2:
                        sel = ".off-network";
                        break;
                    case 3:
                        sel = ".landline";
                        break;
                    case 4:
                        sel = ".grand-total";
                        break;
                }
                return sel;
            }
            
            function dnSelector(dn) {
                var sel = null;
                switch(dn) {
                    case 1:
                        sel = ".day";
                        break;
                    case 2:
                        sel = ".night";
                        break;
                    case 3:
                        sel = ".total";
                        break;
                    case 4:
                        sel = "input";
                        break;
                }
                return sel;
            }
            
            function selector(conn, net, dn) {
                if (conn>2 && net==3) return null;
                return $(connSelector(conn)+" "+netSelector(net)+" "+dnSelector(dn));
            }
            
            function daytime(conn, net, dn) {
                var total;
                total = parseInt(selector(conn, net, 1).val()) + parseInt(selector(conn, net, 2).val());
                selector(conn, net, 3).val(total);
                total = parseInt(selector(conn, 1, 3).val()) + parseInt(selector(conn, 2, 3).val());
                if (conn<3) total += parseInt(selector(conn, 3, 3).val());
                selector(conn, 4, 4).val(total);
            }
            
            function pairTotal(conn, net) {
                var dv = parseInt(selector(conn, net, 1).val()),
                    nv = parseInt(selector(conn, net, 2).val()),
                    tv = parseInt(selector(conn, net, 3).val()),
                    ra = parseFloat(selector(conn, net, 2).data('ratio'));
                
                if(dv+nv>0) ra = 1.0*nv/(dv+nv);                
                nv = Math.round(tv*ra);
                dv = tv-nv;
                             
                selector(conn, net, 2).val(nv);
                selector(conn, net, 1).val(dv);
                
                var total = parseInt(selector(conn, 1, 3).val()) + parseInt(selector(conn, 2, 3).val());
                if (conn<3) total += parseInt(selector(conn, 3, 3).val());
                selector(conn, 4, 4).val(total);
            }
            
            function grandTotal(conn) {
                if(conn<3) {
                    var iv = parseInt(selector(conn, 1, 3).val()),
                        ov = parseInt(selector(conn, 2, 3).val()),
                        lv = parseInt(selector(conn, 3, 3).val()),
                        gv = parseInt(selector(conn, 4, 4).val()),
                        ora = parseFloat(selector(conn, 2, 3).data('ratio')),
                        lra = parseFloat(selector(conn, 3, 3).data('ratio'));
                
                    if(iv+ov+lv>0) {
                        ora = 1.0*ov/(iv+ov+lv);
                        lra = 1.0*lv/(iv+ov+lv);
                    }                        
                    ov = Math.round(gv*ora);
                    lv = Math.round(gv*lra);
                    iv = gv - ov - lv;
                    
                    selector(conn, 1, 3).val(iv);
                    selector(conn, 2, 3).val(ov);
                    selector(conn, 3, 3).val(lv);
                    
                    pairTotal(conn,1);
                    pairTotal(conn,2);
                    pairTotal(conn,3);
                    
                } else {
                    var iv = parseInt(selector(conn, 1, 3).val()),
                        ov = parseInt(selector(conn, 2, 3).val()),                        
                        mv = parseInt(selector(conn, 4, 4).val()),
                        ora = parseFloat(selector(conn, 2, 3).data('ratio'));                        
                        
                    if (iv+ov>0) ora = 1.0*ov/(iv+ov)
                    ov = Math.round(mv*ora);                        
                    iv = mv - ov;
                    
                    selector(conn, 1, 3).val(iv);
                    selector(conn, 2, 3).val(ov);
                    
                    pairTotal(conn,1);
                    pairTotal(conn,2);
                    
                }
            }
            
            function getDurationValue(val, durn) {
                return Math.round(val/30.0*durn);
            }
            
            function callSec(min, sec, varn) {
                var offset = Math.round(Math.random() * 2 * varn - varn);
                sec += offset;
                return min*sec;
            }
            
            function getJSON() {
                var tpl = JSON.parse($('#raw_json').text()),
                    sec = parseInt($('.convert').val()),
                    varn = parseInt($('.variance').val()),
                    durn = parseInt($('.duration').val());
                tpl.data["3G"] = getDurationValue(parseInt($('.data-3g').val())*1000, durn);
                tpl.data["2G"] = getDurationValue(parseInt($('.data-2g').val())*1000, durn);
                tpl.call.local.same_network.day.outgoing.mins = getDurationValue(parseInt(selector(1,1,1).val()), durn);
                tpl.call.local.same_network.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,1,1).val()),sec,varn), durn);
                tpl.call.local.same_network.night.outgoing.mins = getDurationValue(parseInt(selector(1,1,2).val()), durn);
                tpl.call.local.same_network.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,1,2).val()),sec,varn), durn);
                tpl.call.local.other_network.day.outgoing.mins = getDurationValue(parseInt(selector(1,2,1).val()), durn);
                tpl.call.local.other_network.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,2,1).val()),sec,varn), durn);
                tpl.call.local.other_network.night.outgoing.mins = getDurationValue(parseInt(selector(1,2,2).val()), durn);
                tpl.call.local.other_network.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,2,2).val()),sec,varn), durn);
                tpl.call.local.landline.day.outgoing.mins = getDurationValue(parseInt(selector(1,3,1).val()), durn);
                tpl.call.local.landline.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,3,1).val()),sec,varn), durn);
                tpl.call.local.landline.night.outgoing.mins = getDurationValue(parseInt(selector(1,3,2).val()), durn);
                tpl.call.local.landline.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(1,3,2).val()),sec,varn), durn);
                
                tpl.call.std.same_network.day.outgoing.mins = getDurationValue(parseInt(selector(2,1,1).val()), durn);
                tpl.call.std.same_network.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,1,1).val()),sec,varn), durn);
                tpl.call.std.same_network.night.outgoing.mins = getDurationValue(parseInt(selector(2,1,2).val()), durn);
                tpl.call.std.same_network.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,1,2).val()),sec,varn), durn);
                tpl.call.std.other_network.day.outgoing.mins = getDurationValue(parseInt(selector(2,2,1).val()), durn);
                tpl.call.std.other_network.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,2,1).val()),sec,varn), durn);
                tpl.call.std.other_network.night.outgoing.mins = getDurationValue(parseInt(selector(2,2,2).val()), durn);
                tpl.call.std.other_network.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,2,2).val()),sec,varn), durn);
                tpl.call.std.landline.day.outgoing.mins = getDurationValue(parseInt(selector(2,3,1).val()), durn);
                tpl.call.std.landline.day.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,3,1).val()),sec,varn), durn);
                tpl.call.std.landline.night.outgoing.mins = getDurationValue(parseInt(selector(2,3,2).val()), durn);
                tpl.call.std.landline.night.outgoing.secs = getDurationValue(callSec(parseInt(selector(2,3,2).val()),sec,varn), durn);
                
                tpl.sms.local.same_network.day.outgoing = getDurationValue(parseInt(selector(3,1,1).val()), durn);
                tpl.sms.local.same_network.night.outgoing = getDurationValue(parseInt(selector(3,1,2).val()), durn);
                tpl.sms.local.other_network.day.outgoing = getDurationValue(parseInt(selector(3,2,1).val()), durn);
                tpl.sms.local.other_network.night.outgoing = getDurationValue(parseInt(selector(3,2,2).val()), durn);
                
                tpl.sms.std.same_network.day.outgoing = getDurationValue(parseInt(selector(4,1,1).val()), durn);
                tpl.sms.std.same_network.night.outgoing = getDurationValue(parseInt(selector(4,1,2).val()), durn);
                tpl.sms.std.other_network.day.outgoing = getDurationValue(parseInt(selector(4,2,1).val()), durn);
                tpl.sms.std.other_network.night.outgoing = getDurationValue(parseInt(selector(4,2,2).val()), durn);
                
                tpl.dayscount = durn;
                
                $('div.json').html("<pre class='prettyprint linenums'>" + JSON.stringify(tpl, null, 2) + "</pre>");
                $('.json-raw').val(JSON.stringify(tpl)).show();
                prettyPrint();
            }
            
                        
            $(function(){
                $(".net-data input[type=radio]").change(function(){ 
                    if($(".net-data .type-3g").is(':checked')) {
                        $('.net-detail .data-3g').removeAttr('disabled')
                    } else {
                        $('.net-detail .data-3g').attr('disabled', 'disabled').val(0)
                    }
                })
                
                /* Selectors for day/night data change */
                selector(1,1,1).change(function(){daytime(1,1,1);});
                selector(1,1,2).change(function(){daytime(1,1,2);});
                selector(1,2,1).change(function(){daytime(1,2,1);});
                selector(1,2,2).change(function(){daytime(1,2,2);});
                selector(1,3,1).change(function(){daytime(1,3,1);});
                selector(1,3,2).change(function(){daytime(1,3,2);});
                selector(2,1,1).change(function(){daytime(2,1,1);});
                selector(2,1,2).change(function(){daytime(2,1,2);});
                selector(2,2,1).change(function(){daytime(2,2,1);});
                selector(2,2,2).change(function(){daytime(2,2,2);});
                selector(2,3,1).change(function(){daytime(2,3,1);});
                selector(2,3,2).change(function(){daytime(2,3,2);});
                selector(3,1,1).change(function(){daytime(3,1,1);});
                selector(3,1,2).change(function(){daytime(3,1,2);});
                selector(3,2,1).change(function(){daytime(3,2,1);});
                selector(3,2,2).change(function(){daytime(3,2,2);});                
                selector(4,1,1).change(function(){daytime(4,1,1);});
                selector(4,1,2).change(function(){daytime(4,1,2);});
                selector(4,2,1).change(function(){daytime(4,2,1);});
                selector(4,2,2).change(function(){daytime(4,2,2);});
                
                /* Selectors for pairwise total change */
                selector(1,1,3).change(function(){pairTotal(1,1);});
                selector(1,2,3).change(function(){pairTotal(1,2);});
                selector(1,3,3).change(function(){pairTotal(1,3);});
                selector(2,1,3).change(function(){pairTotal(2,1);});
                selector(2,2,3).change(function(){pairTotal(2,2);});
                selector(2,3,3).change(function(){pairTotal(2,3);});
                selector(3,1,3).change(function(){pairTotal(3,1);});
                selector(3,2,3).change(function(){pairTotal(3,2);});
                selector(4,1,3).change(function(){pairTotal(4,1);});
                selector(4,2,3).change(function(){pairTotal(4,2);});
                
                /* Selectors for grand total change */
                selector(1,4,4).change(function(){grandTotal(1);});
                selector(2,4,4).change(function(){grandTotal(2);});
                selector(3,4,4).change(function(){grandTotal(3);});
                selector(4,4,4).change(function(){grandTotal(4);});
                
                $('.get-json').click(getJSON);
            })
        </script>
    </body>    
</html>