@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>الأسئلة</h1>

        <!-- زر لإظهار modal إضافة سؤال جديد -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createQuestionModal">
            إضافة سؤال جديد
        </button>

        @include('components.alerts')

        <!-- جدول الأسئلة -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>المعرف</th>
                    <th>معرف المسابقة</th>
                    <th>السؤال</th>
                    <th>الإجابة</th>
                    <th>العلامة</th>
                    <th>نشط</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->competition_id ? $question->competition->name : 'N/A' }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>{{ $question->mark_question }}</td>
                        <td>{{ $question->is_active ? 'نعم' : 'لا' }}</td>
                        <td>
                            <!-- زر التعديل -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editQuestionModal{{ $question->id }}">
                                تعديل
                            </button>

                            <!-- نموذج الحذف -->
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا السؤال؟')">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal التعديل لكل سؤال -->
                    <div class="modal fade" id="editQuestionModal{{ $question->id }}" tabindex="-1"
                        aria-labelledby="editQuestionModalLabel{{ $question->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editQuestionModalLabel{{ $question->id }}">تعديل السؤال
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="competition_id">معرف المسابقة</label>
                                            <select class="form-control" name="competition_id">
                                                <option value="">اختر مسابقة</option>
                                                @foreach ($competitions as $competition)
                                                    <option value="{{ $competition->id }}"
                                                        {{ $question->competition_id == $competition->id ? 'selected' : '' }}>
                                                        {{ $competition->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="question">السؤال</label>
                                            <input type="text" class="form-control" name="question"
                                                value="{{ $question->question }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">الإجابة</label>
                                            <input type="text" class="form-control" name="answer"
                                                value="{{ $question->answer }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="mark_question">العلامة</label>
                                            <input type="text" class="form-control" name="mark_question"
                                                value="{{ $question->mark_question }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="btn btn-primary">تحديث</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal إضافة سؤال جديد -->
    <div class="modal fade" id="createQuestionModal" tabindex="-1" aria-labelledby="createQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createQuestionModalLabel">إضافة سؤال جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="competition_id">معرف المسابقة</label>
                            <select class="form-control" name="competition_id">
                                <option value="">اختر مسابقة</option>
                                @foreach ($competitions as $competition)
                                    <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question">السؤال</label>
                            <input type="text" class="form-control" name="question">
                        </div>
                        <div class="form-group">
                            <label for="answer">الإجابة</label>
                            <input type="text" class="form-control" name="answer">
                        </div>
                        <div class="form-group">
                            <label for="mark_question">العلامة</label>
                            <input type="text" class="form-control" name="mark_question">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
