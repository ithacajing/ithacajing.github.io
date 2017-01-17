var width = document.getElementById("map").offsetWidth,
    height = width / 2;

var map_projection = d3.geo.albersUsa()
	// Ref: http://info3300.herokuapp.com
    // Quick and dirty scaling
    .scale(width * 1.0)
    // Move the map to the center of the svg element
    .translate([width / 2, height / 2])
    // Call adaptive resampling on the map so it looks good
    .precision(.1);

var map_path = d3.geo.path().projection(map_projection);

var map_svg = d3.select("#map").append("svg")
    .attr("width", width)
    .attr("height", height);
var g = map_svg.append("g");

var transDur = 200;
var selectedState = "Illinois";
var selectedCrop  = "Corn";

document.getElementById('crop_radio_corn').setAttribute("style","border-bottom: 3px solid white;");

var selectedYear  = 2000;

var states_hash = 
{
    'Alabama': 'AL',
    'Alaska': 'AK',
    'American Samoa': 'AS',
    'Arizona': 'AZ',
    'Arkansas': 'AR',
    'California': 'CA',
    'Colorado': 'CO',
    'Connecticut': 'CT',
    'Delaware': 'DE',
    'District of Columbia': 'DC',
    'Federated States of Micronesia': 'FM',
    'Florida': 'FL',
    'Georgia': 'GA',
    'Guam': 'GU',
    'Hawaii': 'HI',
    'Idaho': 'ID',
    'Illinois': 'IL',
    'Indiana': 'IN',
    'Iowa': 'IA',
    'Kansas': 'KS',
    'Kentucky': 'KY',
    'Louisiana': 'LA',
    'Maine': 'ME',
    'Marshall Islands': 'MH',
    'Maryland': 'MD',
    'Massachusetts': 'MA',
    'Michigan': 'MI',
    'Minnesota': 'MN',
    'Mississippi': 'MS',
    'Missouri': 'MO',
    'Montana': 'MT',
    'Nebraska': 'NE',
    'Nevada': 'NV',
    'New Hampshire': 'NH',
    'New Jersey': 'NJ',
    'New Mexico': 'NM',
    'New York': 'NY',
    'North Carolina': 'NC',
    'North Dakota': 'ND',
    'Northern Mariana Islands': 'MP',
    'Ohio': 'OH',
    'Oklahoma': 'OK',
    'Oregon': 'OR',
    'Palau': 'PW',
    'Pennsylvania': 'PA',
    'Puerto Rico': 'PR',
    'Rhode Island': 'RI',
    'South Carolina': 'SC',
    'South Dakota': 'SD',
    'Tennessee': 'TN',
    'Texas': 'TX',
    'Utah': 'UT',
    'Vermont': 'VT',
    'Virgin Islands': 'VI',
    'Virginia': 'VA',
    'Washington': 'WA',
    'West Virginia': 'WV',
    'Wisconsin': 'WI',
    'Wyoming': 'WY'
  };

//Define quantize scale to sort data values into buckets of color
//var color = d3.scale.quantize()
                    //.range(["rgb(237,248,233)","rgb(186,228,179)","rgb(116,196,118)","rgb(49,163,84)","rgb(0,109,44)"]);
 
//color.domain([ 0, 100 ]);

var colorScale = d3.scale.linear().domain([0,140]).range(['#FCDCDE', '#090038']);


//addUsMap();
initMap(selectedYear, selectedCrop);

// Bind the radio element to the graph update function
$("input[type='button']").bind( "click", function(event, ui) {
            if (event.target.value == "Soybean") {
                selectedCrop = "Soybean";
                var node = document.getElementById('crop_radio_corn');
                node.setAttribute("style","border-bottom: none; ");
                var node2 = document.getElementById('crop_radio_soybean');
                node2.setAttribute("style","border-bottom: 3px solid white;");
                this.checked = true;
            } else {
                selectedCrop = "Corn";
                var node = document.getElementById('crop_radio_soybean');
                node.setAttribute("style","border-bottom: none; ");
                var node2 = document.getElementById('crop_radio_corn');
                node2.setAttribute("style","border-bottom: 3px solid white;");
            }
           updateMap(selectedYear, selectedCrop);
});


$('#year_range').change( function(d) {
    //var newValue = this.value;        
    $('#displayYear').html(this.value);
    $("#yearly").html(this.value);
  //  showYear(this.value);
    selectedYear = this.value;
    updateMap(selectedYear, selectedCrop);
    updateBar(selectedYear, "corn");
});

function get_crop_selected() {
    var radios = document.getElementsByName('radio-mini');

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            
            return radios[i].value;
        }
    }

}

function initMap(selectedYear, selectedCrop) {
 
   //Load in Crop data
    var cropFile = "";
    if (selectedCrop == "Corn") {
        cropFile = "data/corn_ge_all.json";
    } else {
        cropFile = "data/soybean_ge_all.json";
    }

    d3.json(cropFile, function(data) {
        //console.log(data)


        //Load in GeoJSON data
        d3.json("data/us-states.json", function(json) {

                    //Merge the ag. data and GeoJSON
                    //Loop through once for each ag. data value
                    for (var i = 0; i < data.length; i++) {
                
                        //Grab state name
                        var dataState = data[i].State;
                        
                        //Grab data value, and convert from string to float
                        var dataValue = parseFloat(data[i]["Y" + selectedYear]);
                
                        //Find the corresponding state inside the GeoJSON
                        for (var j = 0; j < json.features.length; j++) {
                        
                            var jsonState = json.features[j].properties.name;
                
                            if (dataState == jsonState) {
                        
                                //Copy the data value into the JSON
                                json.features[j].properties.value = dataValue;
                                
                                //Stop looking through the JSON
                                break;
                                
                            }
                        }       
                    }

                    var tip = d3.tip()
                        .attr("class","over")
                        .offset([-10,0])
                        .html(function(d){
                            if ( d.properties.value) {
                                pct_planted = d.properties.value + "% ";
                             } else { return ""; }
                            return "<span class='tooltip'>"+pct_planted+" of the crop planted in "+d.properties.name+" is genetically engineered.</span>";
                        });

                    g.call(tip);

                    //Bind data and create one path per GeoJSON feature
                    g.selectAll("path")
                       .data(json.features)
                       .enter()
                       .append("path")
                       .attr("d", map_path)
                       .attr({
                                "id": function(d) {
                                    return d.properties.name;
                                 },
                                 "class": "pin"
                            })
                    
                       .style("fill", function(d) {
                            //Get data value
                            var value = d.properties.value;
                           
                            if (value) {
                                //If value exists…
                                return colorScale(value);
                                
                            } else {
                                //If value is undefined…
                                return "#C7DBC5";
                            }
                        })

                        .on("click", function(d) {
                            d3.selectAll("path.pin").classed("selected", false);
                            d3.select(this).classed("selected", true);
                            
                            if (d.properties.value) { // only clickable for the states in the data file
                                selectedCrop = get_crop_selected();
                                updateChart(d.properties.name);
                                //THIS IS WHERE YOU GOTTA UPDATE THE BAR GRAPH
                            }
                       })
                        .on('mouseover',tip.show)
                            //alert(d.properties.name+": "+d.properties.value+" %");
                        .on('mouseout',tip.hide);

                       g.selectAll("text")
                            .data(json.features)
                            .enter()
                            .append("map_svg:text")
                            .text( function(d) {
                                
                                
                                if ( d.properties.name in states_hash ) {
                                   
                                    var short_name = states_hash[d.properties.name];
                                    
                                     // filter out the following small states
                                    var smallStateIndex = ["VT", "NH", "MA", "RI", "CT", "NJ", "DE", "MD", "DC"].indexOf(short_name);
                                    
                                    if ( smallStateIndex <= -1) {
                                           return short_name;
                                    } 

                                    

                                } else {
                                    return d.properties.name;
                                }
                                
                            })
                            .attr("x", function(d){
                                if (map_path.centroid(d)[0]) { return map_path.centroid(d)[0]; }
                                
                            })
                            .attr("y", function(d){
                                if (map_path.centroid(d)[1]) { return  map_path.centroid(d)[1]; }
                                
                            })
                            .attr('class','state-abbr')
                            .attr("text-anchor","middle")


                }); // end of Load
            
            addLegend(colorScale);

            }); 

    
}

function updateMap(selectedYear, selectedCrop) {

    var cropFile = "";
    if (selectedCrop == "Corn") {
        cropFile = "data/corn_ge_all.json";
    } else {
        cropFile = "data/soybean_ge_all.json";
    }

    d3.json(cropFile, function(data) {
        //console.log(data)


        //Load in GeoJSON data
        d3.json("data/us-states.json", function(json) {

                    //Merge the ag. data and GeoJSON
                    //Loop through once for each ag. data value
                    for (var i = 0; i < data.length; i++) {
                
                        //Grab state name
                        var dataState = data[i].State;
                        
                        //Grab data value, and convert from string to float
                        var dataValue = parseFloat(data[i]["Y" + selectedYear]);
                
                        //Find the corresponding state inside the GeoJSON
                        for (var j = 0; j < json.features.length; j++) {
                        
                            var jsonState = json.features[j].properties.name;
                
                            if (dataState == jsonState) {
                        
                                //Copy the data value into the JSON
                                json.features[j].properties.value = dataValue;
                                
                                //Stop looking through the JSON
                                break;
                                
                            }
                        }       
                    }

                    //Bind data and create one path per GeoJSON feature
                    g.selectAll("path.pin")
                       .data(json.features)
                       .transition().duration(transDur)
                       //.enter()
                       //.append("path")
                       .attr("d", map_path)
                       .style("fill", function(d) {
                            //Get data value
                            var value = d.properties.value;
                           
                            if (value) {
                                //If value exists…
                                return colorScale(value);
                                //return greenScale(value);
                            } else {
                                //If value is undefined…
                                return "#C7DBC5";
                            }
                       });
                       /*
                       .on("click", function(d) {
                            d3.selectAll("path.pin").classed("selected", false);
                            d3.select(this).classed("selected", true);
                            console.log(d);
                            stateClick(d);
            
                       });*/


                }); // end of Load
            
            addLegend(colorScale);

            }); 

    
}

function redraw() {
    // Catch a mouse event and redefine the projection function accordingly
    if (d3.event) {
        map_projection.translate(d3.event.translate).scale(d3.event.scale);
    }

    // Update all the map paths
    map_svg.selectAll("path").transition().attr("d", map_path);

    // Update the pin locations
    map_svg.selectAll(".pin").transition().attr({
        "transform": function(d) {
            return "translate(" + map_projection([d.longitude, d.latitude]) + ")";
        }
    });
}

function addLegend(color) {
    // Remove any cities if they exist
    d3.selectAll(".legend").remove();
	
    var pcts = [];
    
    for (var i = 1; i <= 8; i++) {
        pcts.push( 100 * i / 8 );
    }
	
    var map_legend = map_svg.selectAll("#map_legend")
            .data(pcts).enter()
            .append("g")
            .attr({

                "class": ".legend",

                "transform": function(d, i) {
                    return "translate(0," + (i+10) * 20 + ")";
                }
            });
	
	// Add color scale
    map_legend.append("rect")
            .attr("x", 20)
            .attr("width", 20)
            .attr("height", 20)
            .style("fill", function(d) {
                
                return color(d);
            });

	// Add 
    map_legend.append("text")
            .attr("class", ".legend")
            .style("font-size", "10px")
            .attr("x", 70)
            .attr("y", 12)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function(d) {
                return d + "%";
            });
			
}

