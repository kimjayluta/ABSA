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
			data1: {
				good1: 0, bad1: 0,
				good2: 0, bad2: 0,
				good3: 0, bad3: 0,
				assist: 0,
				defRebound: 0, offRebound: 0,
				steal: 0,
				foul: 0,
				block: 0
			},
			data2: {
				good1: 0, bad1: 0,
				good2: 0, bad2: 0,
				good3: 0, bad3: 0,
				assist: 0,
				defRebound: 0, offRebound: 0,
				steal: 0,
				foul: 0,
				block: 0
			},
			data3: {
				good1: 0, bad1: 0,
				good2: 0, bad2: 0,
				good3: 0, bad3: 0,
				assist: 0,
				defRebound: 0, offRebound: 0,
				steal: 0,
				foul: 0,
				block: 0
			},
			data4: {
				good1: 0, bad1: 0,
				good2: 0, bad2: 0,
				good3: 0, bad3: 0,
				assist: 0,
				defRebound: 0, offRebound: 0,
				steal: 0,
				foul: 0,
				block: 0
			},
			data5: {
				good1: 0, bad1: 0,
				good2: 0, bad2: 0,
				good3: 0, bad3: 0,
				assist: 0,
				defRebound: 0, offRebound: 0,
				steal: 0,
				foul: 0,
				block: 0
			},
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
		return (
			<Table.Row key={count}>
				<Table.Cell> Player </Table.Cell>
				{/* 1 */}
				<Table.Cell collapsing>{this.state[count].good1}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].bad1}</Table.Cell>

				{/* 2 */}
				<Table.Cell collapsing>{this.state[count].good2}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].bad2}</Table.Cell>

				{/* 3 */}
				<Table.Cell collapsing>{this.state[count].good3}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].bad3}</Table.Cell>

				{/* assist */}
				<Table.Cell collapsing>{this.state[count].assist}</Table.Cell>

				{/* rebound */}
				<Table.Cell collapsing>{this.state[count].defRebound}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].offRebound}</Table.Cell>

				{/* steal, foul, block */}
				<Table.Cell collapsing>{this.state[count].steal}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].foul}</Table.Cell>
				<Table.Cell collapsing>{this.state[count].block}</Table.Cell>
			</Table.Row>
		)
	}

	tableRow(count){

		const setValue = (row) => {
			switch (row) {
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

			return this.setState({
				[count]: {
					...this.state[count],
					[row]: this.state[count][row] + 1
				}
			})
		};

		return (
			<Table.Row key={count}>
				<Table.Cell>
					<Dropdown placeholder='State' clearable search selection options={this.state.players} />
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								onClick={() => setValue("good1")}
						>1</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								onClick={() => setValue("bad1")}
						>1</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								onClick={() => setValue("good2")}
						>2</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								onClick={() => setValue("bad2")}
						>2</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"green"} attached='left' size={"tiny"}
								onClick={() => setValue("good3")}
						>3</Button>
						<Button color={"red"} attached='right' size={"tiny"}
								onClick={() => setValue("bad3")}
						>3</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"green"} size={"tiny"}
								onClick={() => setValue("assist")}
					>Assist</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<div>
						<Button color={"grey"} attached='left' size={"tiny"}
								onClick={() => setValue("defRebound")}
						>Defensive</Button>
						<Button color={"grey"} attached='right' size={"tiny"}
								onClick={() => setValue("offRebound")}
						>Offensive</Button>
					</div>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
								onClick={() => setValue("steal")}
					>Steal</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
								onClick={() => setValue("foul")}
					>Foul</Button>
				</Table.Cell>
				<Table.Cell collapsing>
					<Button color={"grey"} size={"tiny"}
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