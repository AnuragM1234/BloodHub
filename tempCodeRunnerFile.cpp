#include<iostream>
#include<vector>
#include<queue>
using namespace std;

void dfs(int node, vector<vector<int>> &adj, vector<int> vis)
{
    vis[node] = 1;
    cout<<node;
    for(auto it:adj[node])
    {
        if(!vis[it])
        dfs(it, adj, vis);
    }
}
int main()
{
    int n, m;
    cout << "Enter number of nodes: ";
    cin >> n;
    cout << "Enter number of edges: ";
    cin >> m;

    vector<vector<int>> adj(n + 1); // Using n+1 to handle 1-based index

    for(int i = 0; i < m; i++)
    {
        int u, v;
        cout << "Enter u and v: ";
        cin >> u >> v;
        adj[u].push_back(v);
        adj[v].push_back(u);
    }
    vector<int> vis(n + 1, 0);
    dfs(1, adj, vis);
    // queue<int> q;
    // int start_node = 1; // Assuming BFS starts at node 1
    // q.push(start_node);
    // vis[start_node] = 1; // Mark start_node as visited

    // while(!q.empty())
    // {
    //     int node = q.front();
    //     cout << node << " ";
    //     q.pop();

    //     for(auto it : adj[node])
    //     {
    //         if(!vis[it])
    //         {
    //             q.push(it);
    //             vis[it] = 1;
    //         }
    //     }
    // }

    return 0;
}
