import React, {Component} from 'react';
import {Button, Dropdown, Table} from "semantic-ui-react";

class Scoring extends Component {
	render() {
		return (
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
							<Table.HeaderCell>Flagrant Foul</Table.HeaderCell>
						</Table.Row>
					</Table.Header>
					<Table.Body>
						<Table.Row>
							<Table.Cell>
								<Dropdown placeholder='Player' search selection options={[
									{
										key: 1,
										text: "Fuck you",
										value: 1
									}
								]} />
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>1</Button>
									<Button color={"red"} attached='right' size={"tiny"}>1</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>2</Button>
									<Button color={"red"} attached='right' size={"tiny"}>2</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>3</Button>
									<Button color={"red"} attached='right' size={"tiny"}>3</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"green"} size={"tiny"}>Assist</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"grey"} attached='left' size={"tiny"}>Defensive</Button>
									<Button color={"grey"} attached='right' size={"tiny"}>Offensive</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Steal</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Foul</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Flagrant Foul</Button>
							</Table.Cell>
						</Table.Row>
						<Table.Row>
							<Table.Cell>
								<Dropdown placeholder='Player' search selection options={[
									{
										key: 1,
										text: "Fuck you",
										value: 1
									}
								]} />
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>1</Button>
									<Button color={"red"} attached='right' size={"tiny"}>1</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>2</Button>
									<Button color={"red"} attached='right' size={"tiny"}>2</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>3</Button>
									<Button color={"red"} attached='right' size={"tiny"}>3</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"green"} size={"tiny"}>Assist</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"grey"} attached='left' size={"tiny"}>Defensive</Button>
									<Button color={"grey"} attached='right' size={"tiny"}>Offensive</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Steal</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Foul</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Flagrant Foul</Button>
							</Table.Cell>
						</Table.Row>
						<Table.Row>
							<Table.Cell>
								<Dropdown placeholder='Player' search selection options={[
									{
										key: 1,
										text: "Fuck you",
										value: 1
									}
								]} />
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>1</Button>
									<Button color={"red"} attached='right' size={"tiny"}>1</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>2</Button>
									<Button color={"red"} attached='right' size={"tiny"}>2</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>3</Button>
									<Button color={"red"} attached='right' size={"tiny"}>3</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"green"} size={"tiny"}>Assist</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"grey"} attached='left' size={"tiny"}>Defensive</Button>
									<Button color={"grey"} attached='right' size={"tiny"}>Offensive</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Steal</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Foul</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Flagrant Foul</Button>
							</Table.Cell>
						</Table.Row>
						<Table.Row>
							<Table.Cell>
								<Dropdown placeholder='Player' search selection options={[
									{
										key: 1,
										text: "Fuck you",
										value: 1
									}
								]} />
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>1</Button>
									<Button color={"red"} attached='right' size={"tiny"}>1</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>2</Button>
									<Button color={"red"} attached='right' size={"tiny"}>2</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>3</Button>
									<Button color={"red"} attached='right' size={"tiny"}>3</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"green"} size={"tiny"}>Assist</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"grey"} attached='left' size={"tiny"}>Defensive</Button>
									<Button color={"grey"} attached='right' size={"tiny"}>Offensive</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Steal</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Foul</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Flagrant Foul</Button>
							</Table.Cell>
						</Table.Row>
						<Table.Row>
							<Table.Cell>
								<Dropdown placeholder='Player' search selection options={[
									{
										key: 1,
										text: "Fuck you",
										value: 1
									}
								]} />
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>1</Button>
									<Button color={"red"} attached='right' size={"tiny"}>1</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>2</Button>
									<Button color={"red"} attached='right' size={"tiny"}>2</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"green"} attached='left' size={"tiny"}>3</Button>
									<Button color={"red"} attached='right' size={"tiny"}>3</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"green"} size={"tiny"}>Assist</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<div>
									<Button color={"grey"} attached='left' size={"tiny"}>Defensive</Button>
									<Button color={"grey"} attached='right' size={"tiny"}>Offensive</Button>
								</div>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Steal</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Foul</Button>
							</Table.Cell>
							<Table.Cell collapsing>
								<Button color={"grey"} size={"tiny"}>Flagrant Foul</Button>
							</Table.Cell>
						</Table.Row>
					</Table.Body>
				</Table>
			</div>
		);
	}
}

export default Scoring;