#include <iostream>
#include <string>
#include <vector>
#include <algorithm>


namespace GLOBAL
{
	std::string databasepath{ '0' };

	bool usefakedatabase = true;

	int Num_Months = 0;

	std::vector<std::vector<std::string>> fakedatabase;
	/*
	Index -> Data
	1 Name
	2 Current Balance
	3 MonthlyIncome
	4 PreviousMonthBalance
	5 MonthlyGoal
	6 SelectedPlan
	7 AP
	*/
}

int IncrementMonths()
{
	return ++GLOBAL::Num_Months;

	for (auto &elem : GLOBAL::fakedatabase)
	{
		elem[4] = elem[2];
		int newcurbal = std::stoi(elem[2]) + std::stoi(elem[3]);
		elem[2] = std::to_string(newcurbal);

		int prevbal = std::stoi(elem[4]);
		int MonthlyGoal = std::stoi(elem[5]);

		//check if Curr_Balance - PrevBalance > MonthlyGoal
		if (newcurbal - prevbal >= MonthlyGoal && MonthlyGoal > 0)
		{
			std::cout << elem[1] << " has reached his monthly goal! Awarded AP: X" 
				/*<< ?? <<*/ << " current AP: " << elem[7] << std::endl;
		}
	}

}

void int_fakedatabase()
{
	std::string Name = "Cong", Current = "1000", Monthly = "2000", Previous = "-1", MonthlyGoal = "-1", SelectedPlan = "-1", AP = "0";
	std::vector<std::string> UserX{ Name, Current, Monthly, MonthlyGoal, SelectedPlan, AP };
	
	GLOBAL::fakedatabase.push_back(UserX);
}

void printfakedatabase()
{
	int elemcount = 0;
	for (auto& elem: GLOBAL::fakedatabase)
	{
		std::cout << elemcount << ":";
		for (auto& ele : elem)
		{
			std::cout << ele << ",";
		}
		std::cout << std::endl;
		elemcount++;
	}
}


int main()
{
	if (!GLOBAL::usefakedatabase)
	{
		/* Will fix this when i rmb how to do file i/o
		while (GLOBAL::databasepath == std::string("0"))
		{
			std::cout << "inputdatabasepath: " << std::endl;
			std::string filename;
			std::getline(std::cin, filename);
			std::ofs

		}*/
	}
	else
	{
		while (1)
		{
			int_fakedatabase();
			printfakedatabase();

			std::string cmd;
			while (std::cin >> cmd);
			{
				if (cmd == "IncrementMonths")
				{
					IncrementMonths();
				}
				else if (cmd == "")
				{

				}
				else if (cmd == "exit")
				{
					exit(0);
				}
			}


			exit(0);


		}
	}


}