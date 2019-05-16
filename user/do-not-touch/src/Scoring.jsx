import React, {Component} from 'react';
import {Button, Dropdown, Table, Header} from "semantic-ui-react";
import NavBar from "./NavBar";

class Scoring extends Component {
	constructor(props) {
		super(props);

		// Make the props as the initial state
		const dataObject = this.props.data;
		const players = Object.keys(dataObject).map(function(key, index) {
			return {
				key,
				value: key,
				text: dataObject[key]
			}
		});

		this.state = {
			orgPlayers: players,
			players: players,
			playerData: {},
			data1: { name: "Player", targetId: null },
			data2: { name: "Player", targetId: null },
			data3: { name: "Player", targetId: null },
			data4: { name: "Player", targetId: null },
			data5: { name: "Player", targetId: null },
			totalPoints: 0
		};

		this.updateOptions = this.updateOptions.bind(this);
	}

	updateOptions(){
		// TODO: Remove the players that is already selected
		// TODO: Remove the players that has 5 fouls..
		return this.state.players;
	}

	tableRowReadOnly(count){
		const targetId = this.state[count].targetId;

		const playerData = (typeof this.state.playerData[targetId] !== "undefined") ?
			this.state.playerData[targetId] : {
				good1: "X", bad1: "X",
				good2: "X", bad2: "X",
				good3: "X", bad3: "X",
				assist: "X",
				defRebound: "X", offRebound: "X",
				steal: "X",
				foul: "X",
				block: "X"
			};

		const {good1, good2, good3, bad1, bad2, bad3, assist, defRebound, offRebound, steal,foul,block} = playerData;

		return (
			<Table.Row key={count}>
				<Table.Cell>{this.state[count].name}</Table.Cell>
				{/* 1 */}
				<Table.Cell collapsing>{good1}</Table.Cell>
				<Table.Cell collapsing>{bad1}</Table.Cell>

				{/* 2 */}
				<Table.Cell collapsing>{good2}</Table.Cell>
				<Table.Cell collapsing>{bad2}</Table.Cell>

				{/* 3 */}
				<Table.Cell collapsing>{good3}</Table.Cell>
				<Table.Cell collapsing>{bad3}</Table.Cell>

				{/* assist */}
				<Table.Cell collapsing>{assist}</Table.Cell>

				{/* rebound */}
				<Table.Cell collapsing>{defRebound}</Table.Cell>
				<Table.Cell collapsing>{offRebound}</Table.Cell>

				{/* steal, foul, block */}
				<Table.Cell collapsing>{steal}</Table.Cell>
				<Table.Cell collapsing>{foul}</Table.Cell>
				<Table.Cell collapsing>{block}</Table.Cell>
			</Table.Row>
		)
	}

	tableRow(count){

		const sendServerData = (data) => {
			let formData = new FormData();
			formData.append('data', JSON.stringify(data));

			fetch(`//${window.location.hostname}/user/api/scoring.php`,
				{
					body: formData,
					method: "post"
				}).then((response) => {
					return response.json();
				})
				.then((jsondata) => {
					console.log(jsondata);
				});
		};

		const setValue = (col) => {
			switch (col) {
				case "good1":
					this.setState({
						totalPoints: this.state.totalPoints + 1
					});
					break;
				case "good2":
					this.setState({
						totalPoints: this.state.totalPoints + 2
					});
					break;
				case "good3":
					this.setState({
						totalPoints: this.state.totalPoints + 3
					});
					break;
				default:
					break;
			}

			const targetId = this.state[count].targetId;
			const totalScore = this.state.playerData[targetId][col] + 1;

			sendServerData({
				player: targetId,
				column: col,
				score: totalScore,
				sid: this.props.targetSID
			});

			return this.setState({
				[count]: {
					...this.state[count],
					[col]: this.state[count][col] + 1
				},
				playerData: {
					...this.state.playerData,
					[targetId]: {
						...this.state.playerData[targetId],
						[col]: totalScore
					}
				}
			})
		};

		const updateName = (name) => {
			// Change the name of the table
			const targetId = name.value;

			if (typeof this.state.playerData[targetId] === "undefined"){
				// Set default scores for the player id
				this.setState({
					playerData: {
						...this.state.playerData,
						[targetId]: {
							good1: 0, bad1: 0,
							good2: 0, bad2: 0,
							good3: 0, bad3: 0,
							assist: 0,
							defRebound: 0, offRebound: 0,
							steal: 0,
							foul: 0,
							block: 0
						}
					}
				})
			}

			let NEW_NAME = name.options.filter(function (val) {
				return val.value === name.value
			});
			NEW_NAME = (NEW_NAME.length) ? NEW_NAME[0].text : "Player";

			return this.setState({
				[count]: {
					...this.state[count], name: NEW_NAME,
					targetId: name.value === "" ? null : name.value
				}
			})
		};

		return (
			<Table.Row key={count}>
				<Table.Cell>
					<Dropdown placeholder='State' clearable search selection
							  options={this.state.players}
							  onChange={(e, data) => updateName(data)}
					/>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("good1")}
						>1</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("bad1")}
						>1</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("good2")}
						>2</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("bad2")}
						>2</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("good3")}
						>3</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("bad3")}
						>3</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"green"} size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("assist")}
					>Assist</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"grey"} attached='left' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("defRebound")}
						>Defensive</Button>
						<Button color={"grey"} attached='right' size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("offRebound")}
						>Offensive</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("steal")}
					>Steal</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("foul")}
					>Foul</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
								disabled={this.state[count].targetId === null}
								onClick={() => setValue("block")}
					>Block</Button>
				</Table.Cell>
			</Table.Row>
		)
	}

	render() {
		return (<>
			<NavBar name={"Scoring"} />
			<Header as='h1' className={"centered aligned"}>{this.state.totalPoints}</Header>
			<div className={"ui container"}>
				<Table singleLine>
					<Table.Header>
						<Table.Row>
							<Table.HeaderCell>Players</Table.HeaderCell>
							<Table.HeaderCell>Free throw</Table.HeaderCell>
							<Table.HeaderCell>2 points</Table.HeaderCell>
							<Table.HeaderCell>3 points</Table.HeaderCell>
							<Table.HeaderCell>Assist</Table.HeaderCell>
							<Table.HeaderCell>Rebound</Table.HeaderCell>
							<Table.HeaderCell>Steal</Table.HeaderCell>
							<Table.HeaderCell>Foul</Table.HeaderCell>
							<Table.HeaderCell>Block</Table.HeaderCell>
						</Table.Row>
					</Table.Header>
					<Table.Body>
						{this.tableRow("data1")}
						{this.tableRow("data2")}
						{this.tableRow("data3")}
						{this.tableRow("data4")}
						{this.tableRow("data5")}
					</Table.Body>
				</Table>
				<Table singleLine celled>
					<Table.Header>
						<Table.Row>
							<Table.HeaderCell>Players</Table.HeaderCell>
							<Table.HeaderCell colSpan={2}>Free throw</Table.HeaderCell>
							<Table.HeaderCell colSpan={2}>2 points</Table.HeaderCell>
							<Table.HeaderCell colSpan={2}>3 points</Table.HeaderCell>
							<Table.HeaderCell colSpan={1}>Assist</Table.HeaderCell>
							<Table.HeaderCell colSpan={2}>Rebound</Table.HeaderCell>
							<Table.HeaderCell colSpan={1}>Steal</Table.HeaderCell>
							<Table.HeaderCell colSpan={1}>Foul</Table.HeaderCell>
							<Table.HeaderCell colSpan={1}>Block</Table.HeaderCell>
						</Table.Row>
					</Table.Header>
					<Table.Body>
						{this.tableRowReadOnly("data1")}
						{this.tableRowReadOnly("data2")}
						{this.tableRowReadOnly("data3")}
						{this.tableRowReadOnly("data4")}
						{this.tableRowReadOnly("data5")}
					</Table.Body>
				</Table>
			</div>
		</>);
	}
}

export default Scoring;