// Set up some arbitrary padding around the axes
var PADDING = {
    top: 20,
    right: 10,
    bottom: 60,
    left: 30,
};

// Pass control of the size of the map to CSS
var width = document.getElementById("state_chart").offsetWidth;
    height = window.innerHeight - 67, 
    barWidth = 8,
    padding = 100;

// create an svg container
var vis = d3.select("#state_chart").append("svg")
    .attr("width", width)
    .attr("height", height);

var transDur = 200;

function newCorn(year, crop){
	var year = year;
    d3.json("data/us_ge.json", function(error, data){
	    var corn_data = [];
	    var soy_data = [];

	    data.forEach(function(d) {
	    	var type = d.GE_Type;
	    	var value = d[year];

	    	if (type == "Corn_BT"){
	  		  	corn_data.push(value);
			}
			else if ( type == "Corn_HT"){
	  		  	corn_data.push(value);
			}
			else if ( type == "Corn_ST" ){
	  		  	corn_data.push(value);
			}
			else {
				soy_data.push(value);
			}
		});

	       if (crop == "corn") { buildCorn(corn_data); }
    	//else { buildSoy(soy_data);}
    });
}

function buildCorn(data){

	var yMax = data[0]+data[1]+data[2];

	var xScale = d3.scale.ordinal()
					.range(height,0);

	var yScale = d3.scale.linear()
					.domain([0,yMax])
					.range([height,0]);

	var color = d3.scale.ordinal()
					.domain([0, 2])
					.range(["rgb(121, 138, 160)","#3e4973","rgb(137, 25, 25)"])

	var labels = ["Insecticide Resistant (Bt) only","Herbicide Tolerant (Ht) only","Herbicide Tolerant AND Insecticide Resistant"];
	//var textLabels = text.attr("x",)


    var tip = d3.tip()
        .attr("class","desc-tip")
        .offset([0,-550])
        .attr("x",0)
        .attr("y",0)
        .attr("text-anchor","right")
        .style("max-width","500px")
        .html(function(){
        	return "<span>Insect-resistant crops (Bt) containing the gene from the soil bacterium Bt (Bacillus thuringiensis) have been available for corn and cotton since 1996. These bacteria produce a protein that is toxic to specific insects, protecting the plant over its entire life.</span>";
        });

    var tip2 = d3.tip()
        .attr("class","desc-tip")
        .offset([178,-550])
        .attr("x",0)
        .attr("y",0)
        .attr("text-anchor","right")
        .style("max-width","500px")
        .html(function(){
        	return "<span>Herbicide-tolerant (Ht) crops, developed to survive application of specific herbicides that previously would have destroyed the crop along with the targeted weeds, provide farmers with a broader variety of options for effective weed control.</span>";
        });

    var tip3 = d3.tip()
        .attr("class","desc-tip")
        .offset([94,-550])
        .attr("x",0)
        .attr("y",0)
        .attr("text-anchor","right")
        .style("max-width","500px")
        .html(function(){
        	return "<span>Stacked gene varieties have both HT and Bt traits. Adoption of stacked varieties has accelerated in recent years. </span>";
        });

    g.call(tip);
    g.call(tip2);
    g.call(tip3);


	height = window.innerHeight - 67;

	var h = height*(data[0]/yMax);
	var rect = vis.append("rect")
				.attr("class","BT")
				.on('mouseover',tip.show)
				.on('mouseout',tip.hide)
				.attr("x",0)
				.attr("y", height-h)
				.attr("width",width)
				.attr("height", h)
				.style("fill","rgb(121, 138, 160)");

	var text = vis.append("text")
				.text(labels[0])
				.attr("x",10)
				.attr("y", height-h+28)
				.attr("fill","white")
				.attr("class","bar-label");

	h1 = height*(data[1]/yMax);
	vis.append("rect")
		.attr("class","HT")
		.attr("x",0)
		.attr("y", height-h-h1)
		.attr("width",width)
		.attr("height", h1)
				.on('mouseover',tip2.show)
				.on('mouseout',tip2.hide)
		.style("fill","#3e4973");

	var text = vis.append("text")
				.text(labels[1])
				.attr("x",10)
				.attr("y", height-h-h1+28)
				.attr("fill","white")
				.attr("class","bar-label1");

	h2 = height*(data[2]/yMax);
	vis.append("rect")
		.attr("class","ST")
		.on('mouseover',tip3.show)
		.on('mouseout',tip3.hide)
		.attr("x",0)
		.attr("y", height-h-h1-h2)
		.attr("width",width)
		.attr("height", h2)
		.style("fill","rgb(137, 25, 25)");
	
	var text = vis.append("text")
				.text(labels[2])
				.attr("x",10)
				.attr("y", height-h-h1-h2+20)
				.attr("fill","white")
				.attr("class","bar-label2");

}

function updateCorn(data){

	var yMax = data[0]+data[1]+data[2];
	var xScale = d3.scale.ordinal()
					.range(height,0);

	var yScale = d3.scale.linear()
					.domain([0,yMax])
					.range([height,0]);

	var color = d3.scale.ordinal()
					.domain([0, 2])
					.range(["rgb(121, 138, 160)","#3e4973","url(#stripes-1)"])

	height = window.innerHeight - 67;
	
	var h = height*(data[0]/yMax);
	vis.selectAll(".BT")
		.transition().duration(300)
		.attr("y", height-h)
		.attr("height", h);
	vis.selectAll(".bar-label")
				.transition().duration(300)
				.attr("y", height-h+28);

	h1 = height*(data[1]/yMax);
	vis.selectAll(".HT")
		.transition().duration(300)
		.attr("y", height-h-h1)
		.attr("height", h1);
	vis.selectAll(".bar-label1")
				.transition().duration(300)
				.attr("y", height-h-h1+28);

	h2 = height*(data[2]/yMax);
	vis.selectAll(".ST")
	    .transition().duration(300)
		.attr("y", height-h-h1-h2)
		.attr("height", h2);
	vis.selectAll(".bar-label2")
				.transition().duration(300)
				.attr("y", height-h-h1-h2+20);

}


function updateBar(year, crop){
    var year = year;
    d3.json("data/us_ge.json", function(error, data){
	    var corn_data = [];
	    var soy_data = [];

	    data.forEach(function(d) {
	    	var type = d.GE_Type;
	    	var value = d[year];

	    	if (type == "Corn_BT"){
	  		  	corn_data.push(value);
			}
			else if ( type == "Corn_HT"){
	  		  	corn_data.push(value);
			}
			else if ( type == "Corn_ST" ){
	  		  	corn_data.push(value);
			}
			else {
				soy_data.push(value);
			}
		});

	       if (crop == "corn") { updateCorn(corn_data); }
    	else { updateCorn(corn_data);} //we don't have any good soy data...

    });

}

newCorn("2001","corn");