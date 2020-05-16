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

	struct plans
	{
		std::string name;
		std::string MonthlyGoalPercent;
		std::string PrevBalancePercent;
		std::string AP;

		plans(std::string n, std::string m = "0", std::string p = "0", std::string a = "0")
		{
			name = n;
			MonthlyGoalPercent = m;
			PrevBalancePercent = p;
			AP = a;
		}
	};

	std::vector<plans> AllPlans;

}


void initPlans ()
{
	GLOBAL::plans agro("Aggressive", "0.5", "0.1", "100");
	GLOBAL::AllPlans.push_back(agro);
}

int IncrementMonths()
{
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

	return ++GLOBAL::Num_Months;
}

void AddNewAccount(std::string name, std::string CurBal = "0", std::string MthlyInc = "0")
{
	GLOBAL::fakedatabase.push_back(std::vector<std::string> {name, CurBal, MthlyInc, "-1", "-1", "0" });
}

void SetCurrentBalance(std::string name, std::string CurBal)
{
	for (auto &elem : GLOBAL::fakedatabase)
	{
		if (elem[0] == name)
		{
			elem[2] = CurBal;
		}
	}
}

void Deposit(std::string name, std::string Val)
{
	for (auto &elem : GLOBAL::fakedatabase)
	{
		if (elem[0] == name)
		{
			elem[2] = std::to_string( std::stoi(elem[2]) + std::stoi(Val));
		}
	}
}

void SetMonthlyGoal(std::string name, std::string goalval)
{
	for (auto &elem : GLOBAL::fakedatabase)
	{
		if (elem[0] == name)
		{
			elem[5] = goalval;
		}
	}
}

void SetSelectedPlan(std::string name, std::string Plan)
{
	for (auto &elem : GLOBAL::fakedatabase)
	{
		if (elem[0] == name)
		{
			elem[5] = "-1";

			for (auto &ele : GLOBAL::AllPlans)
			{
				if (ele.name == Plan)
				{
					elem[6] = Plan;
					elem[5] = std::to_string(std::stoi(ele.MonthlyGoalPercent) * std::stoi(elem[2]));
				}
			}

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
		int_fakedatabase();
		initPlans();
		//printfakedatabase();

		while (1)
		{
			std::string cmd;
			do
				std::cin >> cmd;
			while (cmd == "\0");
			std::cout << cmd << std::endl;

			if (cmd == "IncrementMonths")
			{
				IncrementMonths();
			}
			else if (cmd == "AddNewAccount")
			{
				std::string name;
				do
				{
					std::cout << "Input Name: " << std::endl;
					std::cin >> name;
				}
				while (cmd == "\0");

				AddNewAccount(name);

				printfakedatabase();

			}
			else if (cmd == "")
			{

			}
			else if (cmd == "")
			{

			}
			else if (cmd == "PrintAll")
			{
				printfakedatabase();
			}
			else if (cmd == "exit")
			{
				exit(0);
			}
		}
			
	}

}