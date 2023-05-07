Sub CompareWorksheets(ws1 As Worksheet, ws2 As Worksheet)

    Dim cell As Range
    Dim diffCount As Integer
    
    diffCount = 0
    
    For Each cell In ws1.UsedRange
        
        If Not cell.Value = ws2.Range(cell.Address).Value Then
            
            cell.Interior.Color = vbYellow '标记不同的单元格颜色为黄色
            diffCount = diffCount + 1
            
        End If
        
    Next cell
    
    MsgBox "There are " & diffCount & " differences between the two worksheets."
    
End Sub

Sub CompareFiles()

    Dim file1 As Workbook
    Dim file2 As Workbook
    
    Set file1 = Workbooks.Open("C:\file1.xlsx") '替换为第一个文件的路径
    Set file2 = Workbooks.Open("C:\file2.xlsx") '替换为第二个文件的路径
    
    CompareWorksheets file1.Worksheets(1), file2.Worksheets(1) '比较文件中的第一个工作表
    
    file1.Close False '关闭文件，不保存更改
    file2.Close False
    
End Sub
