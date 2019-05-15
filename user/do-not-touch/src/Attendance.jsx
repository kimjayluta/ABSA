import React, {Component} from 'react';
import {Checkbox, Table} from "semantic-ui-react";

class Attendance extends Component {
	render() {
		return (
			<div className="ui container">
				<Table singleLine>
					<Table.Header>
						<Table.Row>
							<Table.HeaderCell>Id</Table.HeaderCell>
							<Table.HeaderCell>First Name</Table.HeaderCell>
							<Table.HeaderCell>Last Name</Table.HeaderCell>
							<Table.HeaderCell>Action</Table.HeaderCell>
						</Table.Row>
					</Table.Header>
					<Table.Body>
						<Table.Row>
							<Table.Cell collapsing>1</Table.Cell>
							<Table.Cell>Luis Edward</Table.Cell>
							<Table.Cell>Miranda</Table.Cell>
							<Table.Cell collapsing>
								<Checkbox toggle />
							</Table.Cell>
						</Table.Row>
					</Table.Body>
				</Table>
			</div>
		);
	}
}

export default Attendance;