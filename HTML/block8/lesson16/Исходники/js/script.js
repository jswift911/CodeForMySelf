$(function() {
	
	
	var winCellIndex = [
	
		//horizontal
		[0,1,2],[3,4,5],[6,7,8],
		//vertical
		[0,3,6],[1,4,7],[2,5,8],
		//diagonal
		[0,4,8],[2,4,6]
	
	];
	
	var selectedCells = {
		'x':[],
		'o':[]
	}
	
	var player = 'x';
	
	// cell-x cell-o
	$(".wrap").on("click",'.cell:not(".cell-x,.cell-o")',oneStep);
	
	function oneStep(event) {
		var $cell = $(event.currentTarget);
		
		
		$cell.addClass('cell-' + player + ' offset-' + player);
		
		var indexCell = $(".wrap .cell").index($cell);
		var selectedCellsPlayer = selectedCells[player];
		selectedCellsPlayer.push(indexCell);
		
		checkWinner(selectedCellsPlayer);

		if(player === 'x') {
			player = "o";
		}
		else {
			player = "x";
		}
		
		//console.log($cell);
	}
	
	function checkWinner(selectedCellsPlayer) {
		console.log(winCellIndex);
		for(var i = 0; i < winCellIndex.length; i++) {
			var allWinCells = true;
			for(var j = 0; j < winCellIndex[i].length; j++) {
				if($.inArray(winCellIndex[i][j],selectedCellsPlayer) === -1) {
					allWinCells = false;
				}
			}
			
			if(allWinCells) {
				alert("Player " + player + " win!!!");
				
				$(".cell").each(function(ind,elem) {
					if($.inArray(ind,winCellIndex[i]) !== -1) {
						var  cl = "win";
						if( i <= 2 )
							cl += "0"; 
						else if(i >= 3 && i<= 5)
							cl += "1"
						else
							cl += ($.inArray(0,winCellIndex[i])) ? "2" : "3";
					}
					
					cl += " offset-"+player;
					$(this).addClass(cl);
				});
				
				$(".wrap").off("click");
				break;
			}
			if(!allWinCells && $('.cell:not(".cell-x,.cell-o")').length === 0) {
				alert("Ходов больше нет!");
				$(".wrap").off("click");
				break;
			}	
		}
	}
});

